<?php

function getDefaultProfilePhotoPath()
{
    return 'assets/images/default-profil.png';
}

function normalizeProfilePhotoPath($profilePhoto)
{
    $profilePhoto = trim((string) $profilePhoto);

    if ($profilePhoto === '') {
        return getDefaultProfilePhotoPath();
    }

    if (preg_match('#^https?://#i', $profilePhoto)) {
        return $profilePhoto;
    }

    return ltrim(str_replace('\\', '/', $profilePhoto), '/');
}

function getProfilePhotoUrl($profilePhoto, $pathPrefix = '')
{
    $profilePhoto = normalizeProfilePhotoPath($profilePhoto);

    return preg_match('#^https?://#i', $profilePhoto) ? $profilePhoto : $pathPrefix . $profilePhoto;
}

function syncUserSession($user)
{
    if (! is_array($user)) {
        return;
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['nama'] = $user['name'];
    $_SESSION['level'] = function_exists('auth_normalize_role')
        ? auth_normalize_role((string) $user['level'])
        : ($user['level'] ?? '');
    $_SESSION['profile_photo'] = trim((string) ($user['profile_photo'] ?? '')) !== ''
        ? $user['profile_photo']
        : ($user['avatar'] ?? '');
}

function validateAndUploadProfilePhoto($file, $projectRoot)
{
    if (! isset($file['error']) || $file['error'] === UPLOAD_ERR_NO_FILE) {
        return [
            'success' => true,
            'path' => null,
        ];
    }

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return [
            'success' => false,
            'message' => 'Upload foto profil gagal diproses.',
        ];
    }

    if (($file['size'] ?? 0) > 2 * 1024 * 1024) {
        return [
            'success' => false,
            'message' => 'Ukuran foto profil maksimal 2MB.',
        ];
    }

    $extension = strtolower(pathinfo($file['name'] ?? '', PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    $allowedMimeTypes = ['image/jpeg', 'image/png'];
    $mimeType = mime_content_type($file['tmp_name']);

    if (
        ! in_array($extension, $allowedExtensions, true)
        || ! in_array($mimeType, $allowedMimeTypes, true)
        || @getimagesize($file['tmp_name']) === false
    ) {
        return [
            'success' => false,
            'message' => 'Format foto profil harus JPG atau PNG.',
        ];
    }

    $uploadDirRelative = 'uploads/profile';
    $uploadDirAbsolute = rtrim($projectRoot, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'profile';

    if (! is_dir($uploadDirAbsolute) && ! mkdir($uploadDirAbsolute, 0777, true) && ! is_dir($uploadDirAbsolute)) {
        return [
            'success' => false,
            'message' => 'Folder upload foto profil tidak dapat dibuat.',
        ];
    }

    $targetFileName = uniqid('profile_', true) . '.' . ($extension === 'jpeg' ? 'jpg' : $extension);
    $targetAbsolutePath = $uploadDirAbsolute . DIRECTORY_SEPARATOR . $targetFileName;
    $targetRelativePath = $uploadDirRelative . '/' . $targetFileName;

    if (! move_uploaded_file($file['tmp_name'], $targetAbsolutePath)) {
        return [
            'success' => false,
            'message' => 'Foto profil gagal disimpan.',
        ];
    }

    return [
        'success' => true,
        'path' => $targetRelativePath,
    ];
}

function deleteProfilePhotoFile($profilePhoto, $projectRoot)
{
    $profilePhoto = trim((string) $profilePhoto);

    if ($profilePhoto === '' || strpos(str_replace('\\', '/', $profilePhoto), 'uploads/profile/') !== 0) {
        return;
    }

    $absolutePath = rtrim($projectRoot, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, ltrim($profilePhoto, '/'));

    if (is_file($absolutePath)) {
        unlink($absolutePath);
    }
}
