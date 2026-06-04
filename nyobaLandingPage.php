<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      type="image/png"
      href="https://animaproject.s3.amazonaws.com/home/favicon.png"
    />
    <meta name="og:type" content="website" />
    <meta name="twitter:card" content="photo" />
    <script id="anima-load-script" src="load.js"></script>
    <script id="anima-hotspots-script" src="hotspots.js"></script>
    <script id="anima-overrides-script" src="overrides.js"></script>
    <script src="https://animaapp.s3.amazonaws.com/js/timeline.js"></script>
    <style>
      @import url("https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css");

      @import url("https://fonts.googleapis.com/css?family=Inter:400,200italic,600,200,300,800,500,700|Montserrat:400italic,700,600,800,500,400|Material+Icons:400|Poppins:400|Plus+Jakarta+Sans:500,700,400");

      /* The following line is used to measure usage of this code. You can remove it if you want. */
      @import url("https://px.animaapp.com/68f4c69d635d110c520a03ad.68f4c69d635d110c520a03b0.bLlRoIi.hch.png");

      .screen textarea:focus,
      .screen input:focus {
        outline: none;
      }

      .screen * {
        -webkit-font-smoothing: antialiased;
        box-sizing: border-box;
      }

      .screen div {
        -webkit-text-size-adjust: none;
      }

      .component-wrapper a {
        display: contents;
        pointer-events: auto;
        text-decoration: none;
      }

      .component-wrapper * {
        -webkit-font-smoothing: antialiased;
        box-sizing: border-box;
        pointer-events: none;
      }

      .component-wrapper a *,
      .component-wrapper input,
      .component-wrapper video,
      .component-wrapper iframe {
        pointer-events: auto;
      }

      .component-wrapper.not-ready,
      .component-wrapper.not-ready * {
        visibility: hidden !important;
      }

      .screen a {
        display: contents;
        text-decoration: none;
      }

      .full-width-a {
        width: 100%;
      }

      .full-height-a {
        height: 100%;
      }

      .container-center-vertical {
        align-items: center;
        display: flex;
        flex-direction: row;
        height: 100%;
        pointer-events: none;
      }

      .container-center-vertical > * {
        flex-shrink: 0;
        pointer-events: auto;
      }

      .container-center-horizontal {
        display: flex;
        flex-direction: row;
        justify-content: center;
        pointer-events: none;
        width: 100%;
      }

      .container-center-horizontal > * {
        flex-shrink: 0;
        pointer-events: auto;
      }

      .auto-animated div {
        --z-index: -1;
        opacity: 0;
        position: absolute;
      }

      .auto-animated input {
        --z-index: -1;
        opacity: 0;
        position: absolute;
      }

      .auto-animated .container-center-vertical,
      .auto-animated .container-center-horizontal {
        opacity: 1;
      }

      .overlay-base {
        display: none;
        height: 100%;
        opacity: 0;
        position: fixed;
        top: 0;
        width: 100%;
      }

      .overlay-base.animate-appear {
        align-items: center;
        animation: reveal 0.3s ease-in-out 1 normal forwards;
        display: flex;
        flex-direction: column;
        justify-content: center;
        opacity: 0;
      }

      .overlay-base.animate-disappear {
        animation: reveal 0.3s ease-in-out 1 reverse forwards;
        display: block;
        opacity: 1;
        pointer-events: none;
      }

      .overlay-base.animate-disappear * {
        pointer-events: none;
      }

      @keyframes reveal {
        from {
          opacity: 0;
        }
        to {
          opacity: 1;
        }
      }

      .animate-nodelay {
        animation-delay: 0s;
      }

      .align-self-flex-start {
        align-self: flex-start;
      }

      .align-self-flex-end {
        align-self: flex-end;
      }

      .align-self-flex-center {
        align-self: flex-center;
      }

      .valign-text-middle {
        display: flex;
        flex-direction: column;
        justify-content: center;
      }

      .valign-text-bottom {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
      }

      input:focus {
        outline: none;
      }

      .listeners-active,
      .listeners-active * {
        pointer-events: auto;
      }

      .hidden,
      .hidden * {
        pointer-events: none;
        visibility: hidden;
      }

      .smart-layers-pointers,
      .smart-layers-pointers * {
        pointer-events: auto;
        visibility: visible;
      }

      .listeners-active-click,
      .listeners-active-click * {
        cursor: pointer;
      }

      * {
        box-sizing: border-box;
      }
      :root {
        --black: #000000;
        --white: #ffffff;

        --font-size-l: 24px;
        --font-size-m: 16px;
        --font-size-s: 15px;
        --font-size-xl: 68px;

        --font-family-inter: "Inter", Helvetica;
        --font-family-montserrat: "Montserrat", Helvetica;
      }
      .inter-extra-light-black-16px {
        color: var(--black);
        font-family: var(--font-family-inter);
        font-size: var(--font-size-m);
        font-style: italic;
        font-weight: 200;
      }

      .inter-medium-black-16px {
        color: var(--black);
        font-family: var(--font-family-inter);
        font-size: var(--font-size-m);
        font-style: normal;
        font-weight: 500;
      }

      :root {
      }

      .rectangle-142-C61RwL {
        background-color: transparent;
        height: 991px;
        left: 15px;
        position: absolute;
        top: 18px;
        width: 756px;
      }

      .group-80-C61RwL {
        background-color: transparent;
        height: 39px;
        left: 610px;
        position: absolute;
        top: calc(50% - 468px);
        width: 109px;
      }

      .rectangle-143-CX7m3G {
        background-color: transparent;
        border: 1px solid;
        border-color: var(--black);
        border-radius: 40px;
        height: 39px;
        left: 0px;
        position: absolute;
        top: 0px;
        width: 107px;
      }

      .atau-C61RwL {
        height: 21px;
        left: 955px;
        top: 669px;
        width: 291px;
      }

      .atau-nalc9N {
        color: var(--black);
        font-family: var(--font-family-inter);
        font-size: var(--font-size-m);
        font-style: normal;
        font-weight: 300;
        height: auto;
        left: 129px;
        letter-spacing: 0px;
        line-height: normal;
        text-align: left;
        top: 0px;
        width: 68px;
      }

      .line-50-nalc9N {
        background-color: transparent;
        height: 1px;
        left: 189px;
        position: absolute;
        top: 10px;
        width: 100px;
      }

      .line-51-nalc9N {
        background-color: transparent;
        height: 1px;
        left: 0px;
        position: absolute;
        top: 10px;
        width: 100px;
      }

      .email-C61RwL {
        height: 57px;
        left: 836px;
        top: 296px;
        width: 529px;
      }

      .email-AJcDBt {
        height: auto;
        left: 81px;
        letter-spacing: 0px;
        line-height: normal;
        text-align: left;
        top: 18px;
        width: 166px;
      }

      .rectangle-145-AJcDBt {
        background-color: transparent;
        border: 1px solid;
        border-color: var(--black);
        border-radius: 10px;
        height: 57px;
        left: 0px;
        position: absolute;
        top: 0px;
        width: 527px;
      }

      .email-PICrXu {
        height: 26px;
        left: 13px;
        top: 15px;
        width: 26px;
      }

      .password-C61RwL {
        height: 57px;
        left: 835px;
        top: 376px;
        width: 529px;
      }

      .kata-sandi-RPdzxH {
        background-color: transparent;
        height: auto;
        left: 82px;
        letter-spacing: 0px;
        line-height: normal;
        position: absolute;
        text-align: left;
        top: 21px;
        width: 99px;
      }

      .rectangle-147-RPdzxH {
        background-color: transparent;
        border: 1px solid;
        border-color: var(--black);
        border-radius: 10px;
        height: 57px;
        left: 0px;
        position: absolute;
        top: 0px;
        width: 527px;
      }

      .password-RPdzxH {
        height: 28px;
        left: 13px;
        top: 15px;
        width: 28px;
      }

      .username-C61RwL {
        background-color: transparent;
        height: 57px;
        left: 836px;
        position: absolute;
        top: 456px;
        width: 529px;
      }

      .nama-pengguna-webtXY {
        background-color: transparent;
        height: auto;
        left: 81px;
        letter-spacing: 0px;
        line-height: normal;
        position: absolute;
        text-align: left;
        top: 18px;
        width: 137px;
      }

      .rectangle-146-webtXY {
        background-color: transparent;
        border: 1px solid;
        border-color: var(--black);
        border-radius: 10px;
        height: 57px;
        left: 0px;
        position: absolute;
        top: 0px;
        width: 527px;
      }

      .user-webtXY {
        background-color: transparent;
        height: 31px;
        left: 11px;
        position: absolute;
        top: 13px;
        width: 31px;
      }

      .frame-83-C61RwL {
        background-color: transparent;
        height: 32px;
        left: 1026px;
        position: absolute;
        top: 810px;
        width: 147px;
      }

      .google-C61RwL {
        background-color: transparent;
        height: 60px;
        left: calc(50% + 174px);
        position: absolute;
        top: calc(50% + 208px);
        width: 412px;
      }

      .daftar-dengan-google-hBaSeu {
        background-color: transparent;
        color: var(--black);
        font-family: var(--font-family-inter);
        font-size: var(--font-size-m);
        font-style: normal;
        font-weight: 400;
        height: auto;
        left: calc(50% - 84px);
        letter-spacing: 0px;
        line-height: normal;
        position: absolute;
        text-align: left;
        top: calc(50% - 10px);
        white-space: nowrap;
        width: auto;
      }

      .rectangle-149-hBaSeu {
        background-color: transparent;
        border: 1px solid;
        border-color: var(--black);
        border-radius: 25px;
        height: 60px;
        left: 0px;
        position: absolute;
        top: 0px;
        width: 410px;
      }

      .group-hBaSeu {
        aspect-ratio: 0.965505;
        background-color: transparent;
        height: 36.25%;
        left: 21.84%;
        position: absolute;
        top: 31.67%;
        width: 5.1%;
      }

      .vector-vyxFrR {
        height: 40.05%;
        left: 5.17%;
        top: 0px;
        width: 80.25%;
      }

      .vector-oBUzgS {
        height: 44.29%;
        left: 0px;
        top: 27.98%;
        width: 22.24%;
      }

      .vector-2XVQOZ {
        height: 47.04%;
        left: 50.86%;
        top: 40.78%;
        width: 49.14%;
      }

      .atau {
        background-color: transparent;
        position: absolute;
      }

      .email {
        background-color: transparent;
        position: absolute;
      }

      .password {
        background-color: transparent;
        position: absolute;
      }

      .vector {
        background-color: transparent;
        position: absolute;
      }
      /* screen - page-pengaturan-akun */

      .page-pengaturan-akun {
        align-items: flex-start;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        left: 0px;
        opacity: 1;
        overflow-x: hidden;
        position: relative;
        top: 0px;
      }

      .page-pengaturan-akun .group-navbar-C61RwL {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 65px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .navbar-utama-DP1VkW {
        --z-index: 0;
        background-color: transparent;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .page-pengaturan-akun .rectangle-1-a2t32t {
        --z-index: 0;
        background-color: #ffffffcc;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .page-pengaturan-akun .group-82-a2t32t {
        --z-index: 1;
        background-color: transparent;
        height: 1px;
        left: 1284px;
        opacity: 1;
        position: absolute;
        top: 16px;
        width: 1px;
      }

      .page-pengaturan-akun .logo-a2t32t {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        gap: 8px;
        left: 86px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 14px);
      }

      .page-pengaturan-akun .container-srsPWg {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .page-pengaturan-akun .svg-wu39F6 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .page-pengaturan-akun .vector-pIECLt {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .page-pengaturan-akun .heading-1-srsPWg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .page-pengaturan-akun .even-tura-dVRD8C {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .frame-2-a2t32t {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        gap: 21px;
        left: calc(50% - 129px);
        opacity: 1;
        position: absolute;
        top: calc(50% - 10px);
      }

      .page-pengaturan-akun .frame-93-AWqVf7 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .page-pengaturan-akun .beranda-IV52nv {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .frame-94-AWqVf7 {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .page-pengaturan-akun .event-VuxQoF {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .frame-95-AWqVf7 {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .page-pengaturan-akun .tentang-kami-03dhao {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .profil-DP1VkW {
        --z-index: 1;
        aspect-ratio: 1;
        background-color: transparent;
        cursor: pointer;
        height: 30.77%;
        left: 92.36%;
        opacity: 1;
        position: absolute;
        top: 33.85%;
        width: 0px;
      }

      .page-pengaturan-akun .vector-2e1dgV {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-1.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: -5%;
        opacity: 1;
        position: absolute;
        top: 57.5%;
        width: 110%;
      }

      .page-pengaturan-akun .vector-gjYGxX {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-2.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: 26.25%;
        opacity: 1;
        position: absolute;
        top: -5%;
        width: 47.5%;
      }

      .page-pengaturan-akun .container-C61RwL {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        height: 1119px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .footer-utama-tuzc6y {
        --z-index: 0;
        align-items: flex-start;
        background-color: #f5e7b2;
        display: flex;
        flex-wrap: wrap;
        gap: 0px 209px;
        left: 0px;
        opacity: 1;
        padding: 22px 87px;
        position: absolute;
        top: 862px;
        width: 1440px;
      }

      .page-pengaturan-akun .frame-logo-Z3xR4w {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 4px;
        opacity: 1;
        position: relative;
        width: 618px;
      }

      .page-pengaturan-akun .logo-6shg9x {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
      }

      .page-pengaturan-akun .container-wMWPLg {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .page-pengaturan-akun .svg-Wf9oC3 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .page-pengaturan-akun .vector-gfweEi {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .page-pengaturan-akun .heading-1-wMWPLg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .page-pengaturan-akun .even-tura-qxdkx3 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .website-yang-berfung-6shg9x {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-pengaturan-akun .nav-Z3xR4w {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 60px;
        opacity: 1;
        position: relative;
      }

      .page-pengaturan-akun .container-b1OrHs {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 12px;
        height: 156px;
        min-width: 102.83999633789062px;
        opacity: 1;
        position: relative;
        width: 102.83999633789062px;
      }

      .page-pengaturan-akun .link-TVoVcd {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .page-pengaturan-akun .navigasi-QgQI94 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #973131cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .link-i7hCqD {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .page-pengaturan-akun .beranda-xTQRpQ {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .link-lHL0Py {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .page-pengaturan-akun .event-wQp7mC {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .link-DnfJsR {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .page-pengaturan-akun .tentang-lPxg6h {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .container-Hh7C27 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 16px;
        height: 156px;
        opacity: 1;
        position: relative;
        width: 275.3299865722656px;
      }

      .page-pengaturan-akun .heading-3margin-Ejex1t {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 0px 8px;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .heading-3-H9Uiai {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .contact-iwYwCx {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #973131;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-pengaturan-akun .container-Ejex1t {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 12px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .link-fP14VL {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .svg-5Ei1Vk {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .page-pengaturan-akun .vector-U8dFz2 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-4.svg);
        background-size: 100% 100%;
        height: 91.37%;
        left: 4.63%;
        opacity: 1;
        position: absolute;
        top: 4.16%;
        width: 91.2%;
      }

      .page-pengaturan-akun .container-5Ei1Vk {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .page-pengaturan-akun .x1-234-567-890-CeFPzB {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .link-X81PwD {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .svg-q7jzOK {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .page-pengaturan-akun .vector-E8HFz8 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-5.svg);
        background-size: 100% 100%;
        height: 75%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 12.5%;
        width: 91.67%;
      }

      .page-pengaturan-akun .vector-r22zY7 {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-6.svg);
        background-size: 100% 100%;
        height: 33.32%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 25%;
        width: 91.67%;
      }

      .page-pengaturan-akun .container-q7jzOK {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        margin-right: -0.67px;
        opacity: 1;
        position: relative;
      }

      .page-pengaturan-akun .contactislandeventscom-5oHJjz {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .frame-bawah-Z3xR4w {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .page-pengaturan-akun .horizontal-border-DwXFyv {
        --z-index: 0;
        background-color: transparent;
        border-bottom-style: none;
        border-color: #97313133;
        border-left-style: none;
        border-right-style: none;
        border-top-style: solid;
        border-top-width: 1px;
        height: 57px;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .page-pengaturan-akun .container-6UNnxL {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/container.svg);
        background-size: 100% 100%;
        display: inline-flex;
        gap: 24px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 6px);
      }

      .page-pengaturan-akun .container-enQ1rg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: 983px;
        opacity: 1;
        position: absolute;
        top: calc(50% + 8px);
      }

      .page-pengaturan-akun .x2024-island-events-all-rights-reserved-M7zUcX {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #00000099;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .mainmargin-tuzc6y {
        --z-index: 1;
        background-color: transparent;
        height: 1119px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 1440px;
      }

      .page-pengaturan-akun .main-xXn3Dd {
        --z-index: 0;
        background-color: transparent;
        height: 1119px;
        left: 0px;
        opacity: 1;
        position: relative;
        top: 0px;
        width: 100%;
      }

      .page-pengaturan-akun .background-shadow-M7OuBP {
        --z-index: 0;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0px 5px 2px #0000000d;
        height: 324px;
        left: 89px;
        opacity: 1;
        position: relative;
        top: 44px;
        width: 272px;
      }

      .page-pengaturan-akun .container-TkGOxU {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: calc(50% - 100px);
        opacity: 1;
        position: absolute;
        top: 176px;
      }

      .page-pengaturan-akun .heading-1-PGizWL {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .fadiyah-FIVWdu {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #1c1917;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 24px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 32px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .container-PGizWL {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .penggemar-seni-budaya-x27PP2 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #57534e;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .container-g9xb1E {
        --z-index: 2;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 0px 0px;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .pengguna-s7q6ZA {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #78716c;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .button-TkGOxU {
        --z-index: 1;
        align-items: center;
        background-color: #b31919;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        left: 24px;
        opacity: 1;
        padding: 10px 16px;
        position: absolute;
        top: 280px;
        width: calc(100% - 48px);
      }

      .page-pengaturan-akun .edit-profil-iIkd5c {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .container-CPZfq6 {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/container-1.svg);
        background-size: 100% 100%;
        display: inline-flex;
        flex-direction: column;
        left: calc(50% - 64px);
        opacity: 1;
        position: absolute;
        top: 24px;
      }

      .page-pengaturan-akun .frame-84-tuzc6y {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 32px;
        height: 818px;
        left: 381px;
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 44px;
        width: 971px;
      }

      .page-pengaturan-akun .horizontal-border-KOnkAG {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-color: #e7e5e4;
        border-left-style: none;
        border-right-style: none;
        border-top-style: none;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 10px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .nav-tabs-xoDX3N {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        height: 54px;
        opacity: 1;
        padding: 0px 16px;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .link-2fTo3w {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 16px 4px 18px;
        position: relative;
      }

      .page-pengaturan-akun .event-favorit-sDTcee {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #78716c;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -2px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .linkmargin-2fTo3w {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 0px 0px 0px 32px;
        position: relative;
      }

      .page-pengaturan-akun .link-gpEdaj {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        height: 54px;
        opacity: 1;
        padding: 16px 4px 18px;
        position: relative;
      }

      .page-pengaturan-akun .event-yang-disukai-99aFV1 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #78716c;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -2px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .linkmargin-IlCiqr {
        --z-index: 2;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 0px 0px 0px 32px;
        position: relative;
      }

      .page-pengaturan-akun .link-1q54WW {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        border-bottom-style: solid;
        border-bottom-width: 2px;
        border-color: #b31919;
        border-left-style: none;
        border-right-style: none;
        border-top-style: none;
        display: inline-flex;
        flex-direction: column;
        height: 54px;
        opacity: 1;
        padding: 16px 4px 18px;
        position: relative;
      }

      .page-pengaturan-akun .pengaturan-akun-UGCHFd {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -2px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .container-KOnkAG {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 24px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .container-iKiasL {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 16px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .container-0TsBdx {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 4.5px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .label-nama-17uyI3 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #57534e;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .container-17uyI3 {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .input-VLqWxX {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: #ffffff;
        border: 1px solid;
        border-color: #d6d3d1;
        border-radius: 8px;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 10px;
        opacity: 1;
        overflow: hidden;
        padding: 9px 8px;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .container-C3beqk::-webkit-scrollbar {
        display: none;
        width: 0;
      }

      .page-pengaturan-akun .container-C3beqk {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-wrap: nowrap;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: scroll;
        position: relative;
      }

      .page-pengaturan-akun .clara-wijaya-TAVsLj {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #1c1917;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .container-VLqWxX {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        height: 66.67%;
        opacity: 1;
        position: absolute;
        right: 12px;
        top: 16.67%;
      }

      .page-pengaturan-akun .icon-CMaAJH {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 24.020000457763672px;
      }

      .page-pengaturan-akun .vector-E09d5F {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-7.svg);
        background-size: 100% 100%;
        height: 62.5%;
        left: 13.57%;
        opacity: 1;
        position: absolute;
        top: 18.75%;
        width: 72.86%;
      }

      .page-pengaturan-akun .container-F2Rl94 {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 4.5px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .label-email-aLLCs5 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #57534e;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .container-aLLCs5 {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .input-jloOAs {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: #ffffff;
        border: 1px solid;
        border-color: #d6d3d1;
        border-radius: 8px;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 10px;
        opacity: 1;
        overflow: hidden;
        padding: 9px;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .container-86pclk::-webkit-scrollbar {
        display: none;
        width: 0;
      }

      .page-pengaturan-akun .container-86pclk {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-wrap: nowrap;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: scroll;
        position: relative;
      }

      .page-pengaturan-akun .clarawijayaexamplecom-lnxjcK {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #1c1917;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .container-jloOAs {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        height: 66.67%;
        opacity: 1;
        position: absolute;
        right: 12px;
        top: 16.67%;
      }

      .page-pengaturan-akun .icon-A7ka3K {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 24.020000457763672px;
      }

      .page-pengaturan-akun .vector-xsAnTq {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-7.svg);
        background-size: 100% 100%;
        height: 62.5%;
        left: 13.57%;
        opacity: 1;
        position: absolute;
        top: 18.75%;
        width: 72.86%;
      }

      .page-pengaturan-akun .container-DuHS4G {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        gap: 16px;
        height: 40px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-pengaturan-akun .button-64zqwg {
        --z-index: 0;
        align-items: center;
        background-color: #b31919;
        border-radius: 8px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 10px 16px;
        position: relative;
      }

      .page-pengaturan-akun .simpan-perubahan-UZJch0 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .button-t80Ka5 {
        --z-index: 1;
        align-items: center;
        background-color: #b319191a;
        border-radius: 8px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 10px 16px;
        position: relative;
      }

      .page-pengaturan-akun .ubah-kata-sandi-Dx7oaP {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-pengaturan-akun .link-tuzc6y {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        border-radius: 12px;
        display: flex;
        gap: 12px;
        height: 40px;
        left: 164px;
        opacity: 1;
        padding: 6px 16px;
        position: absolute;
        top: 372px;
        width: 119px;
      }

      .page-pengaturan-akun .container-dYHTc4 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .page-pengaturan-akun .icon-ZikfZo {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 24.020000457763672px;
      }

      .page-pengaturan-akun .vector-6kvM35 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-9.svg);
        background-size: 100% 100%;
        height: 62.5%;
        left: 13.57%;
        opacity: 1;
        position: absolute;
        top: 18.75%;
        width: 72.86%;
      }

      .page-pengaturan-akun .container-CxwvYq {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        margin-right: -2.02px;
        opacity: 1;
        position: relative;
      }

      .page-pengaturan-akun .logout-PQP71D {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #1f2937;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }
      /* screen - landing-page */

      .landing-page {
        background-color: transparent;
        margin: 0px;
        min-height: 2653px;
        min-width: 1440px;
        opacity: 1;
        overflow-x: hidden;
        position: relative;
        width: 100%;
      }

      .landing-page .rectangle-117-C61RwL {
        --z-index: 0;
        background-color: #ffffff;
        height: 2653px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 1440px;
      }

      .landing-page .rectangle-134-C61RwL {
        --z-index: 1;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/rectangle-134@2x.png);
        background-size: 100% 100%;
        height: 184px;
        left: 818px;
        opacity: 1;
        position: absolute;
        top: 1302px;
        width: 184px;
      }

      .landing-page .musik-C61RwL {
        --z-index: 2;
        background-color: transparent;
        color: #000000;
        font-family: "Montserrat", Helvetica;
        font-size: 26px;
        font-style: normal;
        font-weight: 600;
        height: auto;
        left: calc(50% - 15px);
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: left;
        top: 775px;
        width: 95px;
      }

      .landing-page .line-25-C61RwL {
        --z-index: 3;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/line-25.svg);
        background-size: 100% 100%;
        height: 759px;
        left: calc(50% + 1px);
        opacity: 1;
        position: absolute;
        top: 1015px;
        width: 3px;
      }

      .landing-page .drama-tari-yang-meme-C61RwL {
        --z-index: 4;
        background-color: transparent;
        color: #000000;
        font-family: "Inter", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        height: auto;
        left: 733px;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 1060px;
        width: 331px;
      }

      .landing-page .rectangle-125-C61RwL {
        --z-index: 5;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/rectangle-125.png);
        background-size: 100% 100%;
        height: 545px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 65px;
        width: 1440px;
      }

      .landing-page .group-jelajahi-event-C61RwL {
        --z-index: 6;
        background-color: transparent;
        cursor: pointer;
        height: 60px;
        left: calc(50% - 117px);
        opacity: 1;
        position: absolute;
        top: 472px;
        width: 236px;
      }

      .landing-page .rectangle-150-NdkEjV {
        --z-index: 0;
        background-color: #b31919;
        border-radius: 8px;
        height: 60px;
        left: calc(50% - 118px);
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 234px;
      }

      .landing-page .jelajahi-event-NdkEjV {
        --z-index: 1;
        background-color: transparent;
        color: #ffffff;
        font-family: "Montserrat", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        height: auto;
        left: calc(50% - 74px);
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 17px;
        white-space: nowrap;
        width: 146px;
      }

      .landing-page .jelajahi-keindahan-n-C61RwL {
        --z-index: 7;
        background-color: transparent;
        color: #ffffff;
        font-family: "Montserrat", Helvetica;
        font-size: 48px;
        font-style: normal;
        font-weight: 800;
        height: auto;
        left: calc(50% - 322px);
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 157px;
        width: 641px;
      }

      .landing-page .temukan-beragam-even-C61RwL {
        --z-index: 8;
        background-color: transparent;
        color: #ffffff;
        font-family: "Inter", Helvetica;
        font-size: 24px;
        font-style: normal;
        font-weight: 400;
        height: auto;
        left: calc(50% - 261px);
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 344px;
        width: 522px;
      }

      .landing-page .kategori-event-C61RwL {
        --z-index: 9;
        background-color: transparent;
        color: #973131;
        font-family: "Montserrat", Helvetica;
        font-size: 34px;
        font-style: normal;
        font-weight: 700;
        height: auto;
        left: calc(50% - 125px);
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 692px;
        width: auto;
      }

      .landing-page .rectangle-133-C61RwL {
        --z-index: 10;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/rectangle-133@2x.png);
        background-size: 100% 100%;
        height: 212px;
        left: 441px;
        opacity: 1;
        position: absolute;
        top: 1044px;
        width: 212px;
      }

      .landing-page .rectangle-135-C61RwL {
        --z-index: 11;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/rectangle-135@2x.png);
        background-size: 100% 100%;
        height: 240px;
        left: 427px;
        opacity: 1;
        position: absolute;
        top: 1525px;
        width: 240px;
      }

      .landing-page .festival-ini-dilaksa-C61RwL {
        --z-index: 12;
        background-color: transparent;
        color: #000000;
        font-family: "Inter", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        height: auto;
        left: 744px;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 1173px;
        width: 325px;
      }

      .landing-page .festival-musik-etnik-C61RwL {
        --z-index: 13;
        background-color: transparent;
        color: #000000;
        font-family: "Inter", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        height: auto;
        left: 370px;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 1338px;
        width: 331px;
      }

      .landing-page .festival-ini-dilaksa-VMr6Om {
        --z-index: 14;
        background-color: transparent;
        color: #000000;
        font-family: "Inter", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        height: auto;
        left: 370px;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 1428px;
        width: 325px;
      }

      .landing-page .full-stop-C61RwL {
        --z-index: 15;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/full-stop@2x.png);
        background-size: 100% 100%;
        height: 19px;
        left: 712px;
        opacity: 1;
        position: absolute;
        top: 1446px;
        width: 19px;
      }

      .landing-page .full-stop-VMr6Om {
        --z-index: 16;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/full-stop@2x.png);
        background-size: 100% 100%;
        height: 19px;
        left: 712px;
        opacity: 1;
        position: absolute;
        top: 1592px;
        width: 19px;
      }

      .landing-page .festival-seni-rupa-k-C61RwL {
        --z-index: 17;
        background-color: transparent;
        color: #000000;
        font-family: "Inter", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        height: auto;
        left: 748px;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 1559px;
        width: 331px;
      }

      .landing-page .budaya-C61RwL {
        --z-index: 18;
        background-color: transparent;
        color: #000000;
        font-family: "Montserrat", Helvetica;
        font-size: 26px;
        font-style: normal;
        font-weight: 600;
        height: auto;
        left: calc(50% - 182px);
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: left;
        top: 775px;
        width: 121px;
      }

      .landing-page .populer-C61RwL {
        --z-index: 19;
        background-color: transparent;
        color: #000000;
        font-family: "Montserrat", Helvetica;
        font-size: 26px;
        font-style: normal;
        font-weight: 400;
        height: auto;
        left: calc(50% - 59px);
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 909px;
        width: 133px;
      }

      .landing-page .seni-C61RwL {
        --z-index: 20;
        background-color: transparent;
        color: #000000;
        font-family: "Montserrat", Helvetica;
        font-size: 26px;
        font-style: normal;
        font-weight: 600;
        height: auto;
        left: calc(50% + 126px);
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: left;
        top: 775px;
        width: 66px;
      }

      .landing-page .line-49-C61RwL {
        --z-index: 21;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/line-49.svg);
        background-size: 100% 100%;
        height: 2px;
        left: calc(50% - 492px);
        opacity: 1;
        position: absolute;
        top: 924px;
        width: 425px;
      }

      .landing-page .line-49-VMr6Om {
        --z-index: 22;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/line-49.svg);
        background-size: 100% 100%;
        height: 2px;
        left: calc(50% + 83px);
        opacity: 1;
        position: absolute;
        top: 924px;
        width: 425px;
      }

      .landing-page .full-stop-mzXdH9 {
        --z-index: 23;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/full-stop@2x.png);
        background-size: 100% 100%;
        height: 19px;
        left: 712px;
        opacity: 1;
        position: absolute;
        top: 1198px;
        width: 19px;
      }

      .landing-page .full-stop-QxM5SU {
        --z-index: 24;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/full-stop@2x.png);
        background-size: 100% 100%;
        height: 19px;
        left: 712px;
        opacity: 1;
        position: absolute;
        top: 1353px;
        width: 19px;
      }

      .landing-page .rectangle-136-C61RwL {
        --z-index: 25;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/rectangle-136@2x.png);
        background-size: 100% 100%;
        height: 327px;
        left: 88px;
        opacity: 1;
        position: absolute;
        top: 940px;
        width: 327px;
      }

      .landing-page .rectangle-139-C61RwL {
        --z-index: 26;
        aspect-ratio: 1.000889;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/rectangle-139@2x.png);
        background-size: 100% 100%;
        height: 320px;
        left: 1033px;
        opacity: 1;
        position: absolute;
        top: 1200px;
        width: 320px;
      }

      .landing-page .rectangle-137-C61RwL {
        --z-index: 27;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/rectangle-137@2x.png);
        background-size: 100% 100%;
        height: 163px;
        left: 270px;
        opacity: 1;
        position: absolute;
        top: 1120px;
        width: 163px;
      }

      .landing-page .rectangle-138-C61RwL {
        --z-index: 28;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/rectangle-138@2x.png);
        background-size: 100% 100%;
        height: 177px;
        left: 1019px;
        opacity: 1;
        position: absolute;
        top: 1367px;
        width: 177px;
      }

      .landing-page .line-52-C61RwL {
        --z-index: 29;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/line-52.svg);
        background-size: 100% 100%;
        height: 1px;
        left: calc(50% - 451px);
        object-fit: cover;
        opacity: 1;
        position: absolute;
        top: 1792px;
        width: 921px;
      }

      .landing-page .footer-utama-C61RwL {
        --z-index: 30;
        align-items: flex-start;
        background-color: #f5e7b2;
        display: flex;
        flex-wrap: wrap;
        gap: 0px 209px;
        left: 0px;
        opacity: 1;
        padding: 22px 87px;
        position: absolute;
        top: 2396px;
        width: 1440px;
      }

      .landing-page .frame-logo-3eZSOx {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 4px;
        opacity: 1;
        position: relative;
        width: 618px;
      }

      .landing-page .logo-Pgxc7x {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
      }

      .landing-page .container-sUvk8b {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .landing-page .svg-VQyxHR {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .landing-page .vector-ejE7rO {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .landing-page .heading-1-sUvk8b {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .landing-page .even-tura-IpDSj6 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .website-yang-berfung-Pgxc7x {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .landing-page .nav-3eZSOx {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 60px;
        opacity: 1;
        position: relative;
      }

      .landing-page .container-RZeYIV {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 12px;
        height: 156px;
        min-width: 102.83999633789062px;
        opacity: 1;
        position: relative;
        width: 102.83999633789062px;
      }

      .landing-page .link-mWGqFj {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .landing-page .navigasi-wNQZ9O {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #973131cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .link-fWKIJf {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .landing-page .beranda-Mrxkqc {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .link-I6ZvsF {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .landing-page .event-wGx39P {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .link-hKxgom {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .landing-page .tentang-9hpzZF {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .container-Y6woBX {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 16px;
        height: 156px;
        opacity: 1;
        position: relative;
        width: 275.3299865722656px;
      }

      .landing-page .heading-3margin-51t4qf {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 0px 8px;
        position: relative;
        width: 100%;
      }

      .landing-page .heading-3-gPjpGW {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .landing-page .contact-K7WKxQ {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #973131;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .landing-page .container-51t4qf {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 12px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .landing-page .link-L2i7IC {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .landing-page .svg-rqKBhx {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .landing-page .vector-0kQQsO {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-11.svg);
        background-size: 100% 100%;
        height: 91.37%;
        left: 4.63%;
        opacity: 1;
        position: absolute;
        top: 4.16%;
        width: 91.2%;
      }

      .landing-page .container-rqKBhx {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .landing-page .x1-234-567-890-ZVOhKv {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .link-v8VhXO {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .landing-page .svg-t1txZ5 {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .landing-page .vector-hcsrO5 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-12.svg);
        background-size: 100% 100%;
        height: 75%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 12.5%;
        width: 91.67%;
      }

      .landing-page .vector-JQBuDP {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-13.svg);
        background-size: 100% 100%;
        height: 33.32%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 25%;
        width: 91.67%;
      }

      .landing-page .container-t1txZ5 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        margin-right: -0.67px;
        opacity: 1;
        position: relative;
      }

      .landing-page .contactislandeventscom-A8kzgc {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .frame-bawah-3eZSOx {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .landing-page .horizontal-border-6CnNgz {
        --z-index: 0;
        background-color: transparent;
        border-bottom-style: none;
        border-color: #97313133;
        border-left-style: none;
        border-right-style: none;
        border-top-style: solid;
        border-top-width: 1px;
        height: 57px;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .landing-page .container-ACU6MY {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/container.svg);
        background-size: 100% 100%;
        display: inline-flex;
        gap: 24px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 6px);
      }

      .landing-page .container-TZinLO {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: 983px;
        opacity: 1;
        position: absolute;
        top: calc(50% + 8px);
      }

      .landing-page .x2024-island-events-all-rights-reserved-MVia0s {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #00000099;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .event-tari-kecak-C61RwL {
        --z-index: 31;
        background-color: transparent;
        color: #000000;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        height: auto;
        left: 821px;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 1028px;
        white-space: nowrap;
        width: auto;
      }

      .landing-page .sawahlunto-international-music-festival-C61RwL {
        --z-index: 32;
        background-color: transparent;
        color: #000000;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        height: auto;
        left: 400px;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 1279px;
        width: 272px;
      }

      .landing-page .art-jog-C61RwL {
        --z-index: 33;
        background-color: transparent;
        color: #000000;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        height: auto;
        left: 874px;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 1524px;
        white-space: nowrap;
        width: auto;
      }

      .landing-page .festival-ini-dilaksa-mzXdH9 {
        --z-index: 34;
        background-color: transparent;
        color: #000000;
        font-family: "Inter", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 400;
        height: auto;
        left: 750px;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 1672px;
        width: 325px;
      }

      .landing-page .full-stop-2P4qUJ {
        --z-index: 35;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/full-stop@2x.png);
        background-size: 100% 100%;
        height: 19px;
        left: 713px;
        opacity: 1;
        position: absolute;
        top: 1686px;
        width: 19px;
      }

      .landing-page .text-C61RwL {
        --z-index: 36;
        align-items: center;
        background-color: transparent;
        color: #000000;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        height: 20px;
        justify-content: center;
        left: 1114px;
        letter-spacing: 0px;
        line-height: 20px;
        opacity: 1;
        position: absolute;
        text-align: left;
        top: 18px;
        white-space: nowrap;
        width: auto;
      }

      .landing-page .container-C61RwL {
        --z-index: 37;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 50px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 1848px;
        width: 100%;
      }

      .landing-page .container-tuzc6y {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 36px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .landing-page .heading-2-0O4qGf {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: 86px;
        opacity: 1;
        position: relative;
        top: calc(50% - 18px);
      }

      .landing-page .event-yang-akan-datang-b7AqNG {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 30px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 36px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .container-SzHptm {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        height: 384px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .landing-page .overlay-shadow-IqtXkx {
        --z-index: 0;
        align-items: flex-start;
        background-color: #ffffff01;
        border-radius: 8px;
        box-shadow: 0px 4px 6px -4px #0000001a, 0px 10px 15px -3px #0000001a;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 100%;
        left: 88px;
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 0px;
        width: calc(100% - 1055px);
      }

      .landing-page .dieng-culture-festival-i0787q {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/dieng-culture-festival@2x.png);
        background-position: 50% 50%;
        background-size: cover;
        height: 384px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .landing-page .gradient-i0787q {
        --z-index: 1;
        background: linear-gradient(
          0deg,
          rgba(0, 0, 0, 0.8) 0%,
          rgba(0, 0, 0, 0) 100%
        );
        background-color: transparent;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .landing-page .container-i0787q {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        bottom: 0px;
        display: inline-flex;
        flex-direction: column;
        gap: 4px;
        left: 0px;
        opacity: 1;
        padding: 20px 24px 24px;
        position: absolute;
      }

      .landing-page .overlay-Dq4CPi {
        --z-index: 0;
        align-items: flex-start;
        background-color: #d94a2bcc;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        opacity: 1;
        padding: 4px 12px;
        position: relative;
      }

      .landing-page .budaya-WxjmlD {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .heading-3-Dq4CPi {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .landing-page .festival-teluk-tomini-wfxVPg {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 24px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 32px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .container-Dq4CPi {
        --z-index: 2;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        opacity: 1;
        padding: 4px 0px 0px;
        position: relative;
        width: 100%;
      }

      .landing-page .margin-7eaTKT {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 8px 0px 0px;
        position: relative;
      }

      .landing-page .calendar_today-lvnVfz {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #d1d5db;
        display: flex;
        font-family: "Material Icons", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .container-7eaTKT {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .landing-page .x20-22-november-2025-y2lrzM {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #d1d5db;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .overlay-shadow-jZFcQ9 {
        --z-index: 1;
        align-items: flex-start;
        background-color: #ffffff01;
        border-radius: 8px;
        box-shadow: 0px 4px 6px -4px #0000001a, 0px 10px 15px -3px #0000001a;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 100%;
        left: 528px;
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 0px;
        width: calc(100% - 1055px);
      }

      .landing-page .solo-international-performing-arts-pjPLCN {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/solo-international-performing-arts@2x.png);
        background-position: 50% 50%;
        background-size: cover;
        height: 384px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .landing-page .gradient-pjPLCN {
        --z-index: 1;
        background: linear-gradient(
          0deg,
          rgba(0, 0, 0, 0.8) 0%,
          rgba(0, 0, 0, 0) 100%
        );
        background-color: transparent;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .landing-page .container-pjPLCN {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        bottom: 0px;
        display: inline-flex;
        flex-direction: column;
        gap: 4px;
        left: 0px;
        min-width: 384px;
        opacity: 1;
        padding: 20px 24px 24px;
        position: absolute;
      }

      .landing-page .overlay-9o6NIf {
        --z-index: 0;
        align-items: flex-start;
        background-color: #d94a2bcc;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        opacity: 1;
        padding: 4px 12px;
        position: relative;
      }

      .landing-page .musik-XejOzs {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .heading-3-9o6NIf {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .landing-page .ngayogjazz-vjyijc {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 24px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 32px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .container-9o6NIf {
        --z-index: 2;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        opacity: 1;
        padding: 4px 0px 0px;
        position: relative;
        width: 100%;
      }

      .landing-page .margin-BxPfQ4 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 8px 0px 0px;
        position: relative;
      }

      .landing-page .calendar_today-WwskwY {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #d1d5db;
        display: flex;
        font-family: "Material Icons", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .container-BxPfQ4 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .landing-page .x15-november-2025-LHaY2F {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #d1d5db;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .span0-atUVTE {
        font-style: normal;
      }

      .landing-page .span1-atUVTE {
        font-family: "Poppins", Helvetica;
        font-style: normal;
      }

      .landing-page .overlay-shadow-M6I83p {
        --z-index: 2;
        align-items: flex-start;
        background-color: #ffffff01;
        border-radius: 8px;
        box-shadow: 0px 4px 6px -4px #0000001a, 0px 10px 15px -3px #0000001a;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 384px;
        left: 968px;
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 0px;
        width: 385px;
      }

      .landing-page .festival-kuliner-nusantara-sWymdG {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/festival-kuliner-nusantara@2x.png);
        background-position: 50% 50%;
        background-size: cover;
        height: 384px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .landing-page .gradient-sWymdG {
        --z-index: 1;
        background: linear-gradient(
          0deg,
          rgba(0, 0, 0, 0.8) 0%,
          rgba(0, 0, 0, 0) 100%
        );
        background-color: transparent;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .landing-page .container-sWymdG {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        bottom: 0px;
        display: inline-flex;
        flex-direction: column;
        gap: 4px;
        left: 0px;
        opacity: 1;
        padding: 20px 24px 24px;
        position: absolute;
      }

      .landing-page .overlay-E8YMWw {
        --z-index: 0;
        align-items: flex-start;
        background-color: #d94a2bcc;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        opacity: 1;
        padding: 4px 12px;
        position: relative;
      }

      .landing-page .seni-xEfpWw {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .heading-3-E8YMWw {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .landing-page .festival-nusa-dua-3wofCL {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 24px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 32px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .container-E8YMWw {
        --z-index: 2;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        opacity: 1;
        padding: 4px 0px 0px;
        position: relative;
        width: 100%;
      }

      .landing-page .margin-mbJ2bX {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 8px 0px 0px;
        position: relative;
      }

      .landing-page .calendar_today-rCuuB3 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #d1d5db;
        display: flex;
        font-family: "Material Icons", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .container-mbJ2bX {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .landing-page .x25-26-oktober-2025-HRf176 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #d1d5db;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .span0-5Wj7Xw {
        font-style: normal;
      }

      .landing-page .span1-5Wj7Xw {
        font-family: "Poppins", Helvetica;
        font-style: normal;
      }

      .landing-page .frame-92-C61RwL {
        --z-index: 38;
        background-color: transparent;
        height: 18px;
        left: 586px;
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 23px;
        width: 53px;
      }

      .landing-page .navbar-utama-C61RwL {
        --z-index: 39;
        background-color: transparent;
        height: 65px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 1440px;
      }

      .landing-page .rectangle-1-V2A9qo {
        --z-index: 0;
        background-color: #ffffffcc;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .landing-page .group-81-V2A9qo {
        --z-index: 1;
        background-color: transparent;
        cursor: pointer;
        height: 33px;
        left: 1204px;
        opacity: 1;
        position: absolute;
        top: 16px;
        width: 71px;
      }

      .landing-page .rectangle-144-jxZFRv {
        --z-index: 0;
        aspect-ratio: 2.095238;
        background-color: #b31919;
        border-radius: 7px;
        height: 33px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 69px;
      }

      .landing-page .masuk-jxZFRv {
        --z-index: 1;
        background-color: transparent;
        color: #ffffff;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 700;
        height: auto;
        left: 9px;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 7px;
        white-space: nowrap;
        width: 53px;
      }

      .landing-page .group-82-V2A9qo {
        --z-index: 2;
        background-color: transparent;
        cursor: pointer;
        height: 33px;
        left: 1284px;
        opacity: 1;
        position: absolute;
        top: 16px;
        width: 71px;
      }

      .landing-page .rectangle-145-plqy7w {
        --z-index: 0;
        aspect-ratio: 2.095238;
        background-color: #f6f1f1;
        border-radius: 7px;
        height: 33px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 69px;
      }

      .landing-page .daftar-plqy7w {
        --z-index: 1;
        background-color: transparent;
        color: #b31919;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 700;
        height: auto;
        left: 9px;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: center;
        top: 7px;
        white-space: nowrap;
        width: auto;
      }

      .landing-page .logo-V2A9qo {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        gap: 8px;
        left: 86px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 14px);
      }

      .landing-page .container-f2fp1k {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .landing-page .svg-3WEV9o {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .landing-page .vector-wDltJv {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-14.png);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .landing-page .heading-1-f2fp1k {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .landing-page .even-tura-lOLSDg {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .frame-2-V2A9qo {
        --z-index: 4;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        gap: 21px;
        left: calc(50% - 129px);
        opacity: 1;
        position: absolute;
        top: calc(50% - 10px);
      }

      .landing-page .frame-93-zR1zn9 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-color: #000000;
        border-left-style: none;
        border-right-style: none;
        border-top-style: none;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .landing-page .beranda-4s0eCj {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .frame-94-zR1zn9 {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .landing-page .event-2a25hI {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .frame-95-zR1zn9 {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .landing-page .tentang-kami-MiM0oB {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .landing-page .line-54-C61RwL {
        --z-index: 40;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/line-54.svg);
        background-size: 100% 100%;
        height: 1px;
        left: 408px;
        object-fit: cover;
        opacity: 1;
        position: absolute;
        top: 1328px;
        width: 260px;
      }

      .landing-page .line-55-C61RwL {
        --z-index: 41;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/line-55.svg);
        background-size: 100% 100%;
        height: 1px;
        left: 812px;
        object-fit: cover;
        opacity: 1;
        position: absolute;
        top: 1051px;
        width: 181px;
      }

      .landing-page .line-57-C61RwL {
        --z-index: 42;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/line-57.svg);
        background-size: 100% 100%;
        height: 1px;
        left: 869px;
        object-fit: cover;
        opacity: 1;
        position: absolute;
        top: 1549px;
        width: 83px;
      }
      /* screen - jelajah-event-u40semuau41 */

      .jelajah-event-u40semuau41 {
        align-items: flex-start;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        height: 1976px;
        left: 0px;
        opacity: 1;
        overflow-x: hidden;
        position: relative;
        top: 0px;
      }

      .jelajah-event-u40semuau41 .container-C61RwL {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 1976px;
        min-height: 1200px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .container-tuzc6y {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: flex;
        justify-content: space-between;
        left: 88px;
        opacity: 1;
        position: absolute;
        top: 323px;
        width: 1265px;
      }

      .jelajah-event-u40semuau41 .container-0O4qGf {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        max-width: 512px;
        opacity: 1;
        position: relative;
        width: 512px;
        z-index: 1;
      }

      .jelajah-event-u40semuau41 .input-HwucOk {
        --z-index: 0;
        align-self: stretch;
        background-color: #ffffff;
        border: 1px solid;
        border-color: #d1d5db;
        border-radius: 9999px;
        height: 50px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .container-tx4o88 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        left: 49px;
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 15px;
        width: calc(100% - 81px);
      }

      .jelajah-event-u40semuau41 .cari-event-gk9fov {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .container-4GP36P {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: flex;
        left: 49px;
        opacity: 1;
        position: absolute;
        top: 13px;
        width: calc(100% - 66px);
      }

      .jelajah-event-u40semuau41 .container-xa8gsi {
        --z-index: 0;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        height: 24px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .margin-xa8gsi {
        --z-index: 1;
        background-color: transparent;
        height: 11px;
        opacity: 1;
        position: relative;
        width: 15px;
      }

      .jelajah-event-u40semuau41 .container-HwucOk {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        height: 100%;
        left: 0px;
        opacity: 1;
        padding: 0px 0px 0px 16px;
        position: absolute;
        top: 0px;
      }

      .jelajah-event-u40semuau41 .container-wyixDA {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .icon-H6K5wj {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 24.020000457763672px;
      }

      .jelajah-event-u40semuau41 .vector-bvrxXo {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-23.svg);
        background-size: 100% 100%;
        height: 62.5%;
        left: 13.57%;
        opacity: 1;
        position: absolute;
        top: 18.75%;
        width: 72.86%;
      }

      .jelajah-event-u40semuau41 .container-JDzFfr {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        z-index: 0;
      }

      .jelajah-event-u40semuau41 .background-border-Tp120e {
        --z-index: 0;
        align-items: center;
        background-color: #ffffff;
        border: 1px solid;
        border-color: #d1d5db;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        opacity: 1;
        padding: 5px;
        position: relative;
      }

      .jelajah-event-u40semuau41 .button-6HRP9x {
        --z-index: 0;
        align-items: center;
        background-color: #b31919;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40semuau41 .semua-n0xcSu {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .button-qKgOq2 {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        border-radius: 9999px;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40semuau41 .budaya-oMakLr {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .button-prkIex {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        border-radius: 9999px;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40semuau41 .musik-3r5CUf {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .button-TsOwUt {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        border-radius: 9999px;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40semuau41 .seni-2a4uZB {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .frame-event-tuzc6y {
        --z-index: 1;
        background-color: transparent;
        display: grid;
        gap: 67px 80px;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        grid-template-rows: repeat(3, minmax(0, 1fr));
        height: 1214px;
        left: 88px;
        opacity: 1;
        position: absolute;
        top: 414px;
        width: 1265px;
      }

      .jelajah-event-u40semuau41 .group-event-ZQj5rd {
        --z-index: 0;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        grid-column: 1 / 2;
        grid-row: 1 / 2;
        height: 360px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 368px;
      }

      .jelajah-event-u40semuau41 .container-6HBprP {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .image-iJXLko {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/image-7@2x.png);
        background-size: 100% 100%;
        height: 212px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .container-MeubjC {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .margin-SRg4Jx {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-1bnNkN {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .overlay-VF83bb {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40semuau41 .musik-rbbqW3 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .link-VF83bb {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .lihat-detail-3zJcI6 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .container-SRg4Jx {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-gIn1ox {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .konser-musik-indie-oJsIyX {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .container-g5mVxD {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .jumat-14-juni-2024-bandung-MYZzWk {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .group-event-ClCxXZ {
        --z-index: 1;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        grid-column: 2 / 3;
        grid-row: 1 / 2;
        height: 360px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 369px;
      }

      .jelajah-event-u40semuau41 .container-UWpGW2 {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .image-wZJTIZ {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/image-3.png);
        background-size: 100% 100%;
        height: 212px;
        object-fit: cover;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .container-RcUxxa {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .margin-HbMBN9 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-LIJ3Ng {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .overlay-Iox1J3 {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40semuau41 .musik-ne6wyy {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .link-Iox1J3 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .lihat-detail-mN92du {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .container-HbMBN9 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-AdvYEi {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .konser-musik-indie-QH5jde {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .container-TaT5Qx {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .jumat-14-juni-2024-bandung-NsAhyT {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .group-event-u4eP1n {
        --z-index: 2;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        grid-column: 3 / 4;
        grid-row: 1 / 2;
        height: 360px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 368px;
      }

      .jelajah-event-u40semuau41 .container-ve44sX {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .image-L6oAi1 {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/image-8@2x.png);
        background-size: 100% 100%;
        height: 212px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .container-tvbMP9 {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .margin-gknqd7 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-JY6Ycb {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .overlay-DXnM6d {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40semuau41 .musik-hKDDRr {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .link-DXnM6d {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .lihat-detail-ScnGlO {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .container-gknqd7 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-hgqrsa {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .konser-musik-indie-oqnjXv {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .container-oiZBiB {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .jumat-14-juni-2024-bandung-QRp4Eb {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .group-event-y8OG5Z {
        --z-index: 3;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        grid-column: 1 / 2;
        grid-row: 2 / 3;
        height: 360px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 368px;
      }

      .jelajah-event-u40semuau41 .container-SnxG9e {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .image-5dpvns {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/image.png);
        background-size: 100% 100%;
        height: 212px;
        object-fit: cover;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .container-QxakxC {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .margin-VtWacv {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-tn5wOB {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .overlay-opSC1N {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40semuau41 .musik-AnwXjV {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .link-opSC1N {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .lihat-detail-yaHA5D {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .container-VtWacv {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-oP40vu {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .konser-musik-indie-NNDLso {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .container-28QYkS {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .jumat-14-juni-2024-bandung-LmeN49 {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .group-event-JjBYgc {
        --z-index: 4;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        grid-column: 2 / 3;
        grid-row: 2 / 3;
        height: 360px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 369px;
      }

      .jelajah-event-u40semuau41 .container-KUlwI2 {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .image-xGB324 {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/image-4.png);
        background-size: 100% 100%;
        height: 212px;
        object-fit: cover;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .container-YvRBMR {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .margin-m3DgbK {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-qjbG1z {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .overlay-FaYKIK {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40semuau41 .musik-gxsawd {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .link-FaYKIK {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .lihat-detail-EUtmdI {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .container-m3DgbK {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-JDVP8k {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .konser-musik-indie-U8hDe4 {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .container-3x7fL0 {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .jumat-14-juni-2024-bandung-APfnpc {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .group-event-Uw8hfZ {
        --z-index: 5;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        grid-column: 3 / 4;
        grid-row: 2 / 3;
        height: 360px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 368px;
      }

      .jelajah-event-u40semuau41 .container-APRxxb {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .image-Q8KIxu {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/image-5.png);
        background-size: 100% 100%;
        height: 212px;
        object-fit: cover;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .container-tJXEsd {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .margin-XJeo1s {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-vaDxos {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .overlay-n335Wz {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40semuau41 .musik-ILIWvm {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .link-n335Wz {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .lihat-detail-2Lf3oN {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .container-XJeo1s {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-Cr6oDX {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .konser-musik-indie-EHXxeS {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .container-xdPjnP {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .jumat-14-juni-2024-bandung-FjIS1x {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .group-event-Ws2MfP {
        --z-index: 6;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        grid-column: 1 / 2;
        grid-row: 3 / 4;
        height: 360px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 368px;
      }

      .jelajah-event-u40semuau41 .container-PJvxIR {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .image-4zxa65 {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/image-2.png);
        background-size: 100% 100%;
        height: 212px;
        object-fit: cover;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .container-AkbCPl {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .margin-YiZxMv {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-W4xtCc {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .overlay-wQSlVS {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40semuau41 .musik-MsTSi3 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .link-wQSlVS {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .lihat-detail-BF4x7k {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .container-YiZxMv {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-x4DSmc {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .konser-musik-indie-EC7Hxg {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .container-vmsYG3 {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .jumat-14-juni-2024-bandung-A122xD {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .group-event-0HhchJ {
        --z-index: 7;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        grid-column: 2 / 3;
        grid-row: 3 / 4;
        height: 360px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 369px;
      }

      .jelajah-event-u40semuau41 .container-FPSI7B {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .image-9dFjgD {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/image-1.png);
        background-size: 100% 100%;
        height: 212px;
        object-fit: cover;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .container-wQ38DY {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .margin-0xEZen {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-NshazQ {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .overlay-Lj88qt {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40semuau41 .musik-5AJQxK {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .link-Lj88qt {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .lihat-detail-qcAkkI {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .container-0xEZen {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-trZgSe {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .konser-musik-indie-2UmqrH {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .container-HLTx4n {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .jumat-14-juni-2024-bandung-8exeEL {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .group-event-ndXNxS {
        --z-index: 8;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        grid-column: 3 / 4;
        grid-row: 3 / 4;
        height: 360px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 368px;
      }

      .jelajah-event-u40semuau41 .container-BqwiSt {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .image-BVgTVG {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/image-6.png);
        background-size: 100% 100%;
        height: 212px;
        object-fit: cover;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .container-eD5juu {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .margin-Wxiu4y {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-LqrdgL {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .overlay-zOhzKO {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40semuau41 .musik-0xowVU {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .link-zOhzKO {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .lihat-detail-pADsEl {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .container-Wxiu4y {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40semuau41 .container-X2h4Rk {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .konser-musik-indie-9C0x86 {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .container-qzriCM {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .jumat-14-juni-2024-bandung-Ud6sc0 {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .footer-utama-tuzc6y {
        --z-index: 2;
        align-items: flex-start;
        background-color: #f5e7b2;
        display: flex;
        flex-wrap: wrap;
        gap: 0px 209px;
        left: 0px;
        opacity: 1;
        padding: 22px 87px;
        position: absolute;
        top: 1719px;
        width: 1440px;
      }

      .jelajah-event-u40semuau41 .frame-logo-Z3xR4w {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 4px;
        opacity: 1;
        position: relative;
        width: 618px;
      }

      .jelajah-event-u40semuau41 .logo-6shg9x {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .container-wMWPLg {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40semuau41 .svg-Wf9oC3 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40semuau41 .vector-gfweEi {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .jelajah-event-u40semuau41 .heading-1-wMWPLg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .even-tura-qxdkx3 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .website-yang-berfung-6shg9x {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .nav-Z3xR4w {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 60px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .container-b1OrHs {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 12px;
        height: 156px;
        min-width: 102.83999633789062px;
        opacity: 1;
        position: relative;
        width: 102.83999633789062px;
      }

      .jelajah-event-u40semuau41 .link-TVoVcd {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .navigasi-QgQI94 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #973131cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .link-i7hCqD {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .beranda-xTQRpQ {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .link-lHL0Py {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .event-wQp7mC {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .link-DnfJsR {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .tentang-lPxg6h {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .container-Hh7C27 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 16px;
        height: 156px;
        opacity: 1;
        position: relative;
        width: 275.3299865722656px;
      }

      .jelajah-event-u40semuau41 .heading-3margin-Ejex1t {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 0px 8px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .heading-3-H9Uiai {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .contact-iwYwCx {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #973131;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40semuau41 .container-Ejex1t {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 12px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .link-fP14VL {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .svg-5Ei1Vk {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .jelajah-event-u40semuau41 .vector-U8dFz2 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-25.svg);
        background-size: 100% 100%;
        height: 91.37%;
        left: 4.63%;
        opacity: 1;
        position: absolute;
        top: 4.16%;
        width: 91.2%;
      }

      .jelajah-event-u40semuau41 .container-5Ei1Vk {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .x1-234-567-890-CeFPzB {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .link-X81PwD {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .svg-q7jzOK {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .jelajah-event-u40semuau41 .vector-E8HFz8 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-26.svg);
        background-size: 100% 100%;
        height: 75%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 12.5%;
        width: 91.67%;
      }

      .jelajah-event-u40semuau41 .vector-r22zY7 {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-27.svg);
        background-size: 100% 100%;
        height: 33.32%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 25%;
        width: 91.67%;
      }

      .jelajah-event-u40semuau41 .container-q7jzOK {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        margin-right: -0.67px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .contactislandeventscom-5oHJjz {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .frame-bawah-Z3xR4w {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .jelajah-event-u40semuau41 .horizontal-border-DwXFyv {
        --z-index: 0;
        background-color: transparent;
        border-bottom-style: none;
        border-color: #97313133;
        border-left-style: none;
        border-right-style: none;
        border-top-style: solid;
        border-top-width: 1px;
        height: 57px;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .jelajah-event-u40semuau41 .container-6UNnxL {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/container.svg);
        background-size: 100% 100%;
        display: inline-flex;
        gap: 24px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 6px);
      }

      .jelajah-event-u40semuau41 .container-enQ1rg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: 983px;
        opacity: 1;
        position: absolute;
        top: calc(50% + 8px);
      }

      .jelajah-event-u40semuau41
        .x2024-island-events-all-rights-reserved-M7zUcX {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #00000099;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .group-navbar-tuzc6y {
        --z-index: 3;
        background-color: transparent;
        height: 65px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 1440px;
      }

      .jelajah-event-u40semuau41 .navbar-utama-Sd2iYW {
        --z-index: 0;
        background-color: transparent;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .rectangle-1-CEpvzl {
        --z-index: 0;
        background-color: #ffffffcc;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .group-82-CEpvzl {
        --z-index: 1;
        background-color: transparent;
        height: 1px;
        left: 1284px;
        opacity: 1;
        position: absolute;
        top: 16px;
        width: 1px;
      }

      .jelajah-event-u40semuau41 .logo-CEpvzl {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        gap: 8px;
        left: 86px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 14px);
      }

      .jelajah-event-u40semuau41 .container-cefsQo {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40semuau41 .svg-g0o5N4 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40semuau41 .vector-a6SbKW {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .jelajah-event-u40semuau41 .heading-1-cefsQo {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40semuau41 .even-tura-P6utxz {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .frame-2-CEpvzl {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        gap: 21px;
        left: calc(50% - 129px);
        opacity: 1;
        position: absolute;
        top: calc(50% - 10px);
      }

      .jelajah-event-u40semuau41 .frame-93-2du5Ul {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .jelajah-event-u40semuau41 .beranda-sVjxRp {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .frame-94-2du5Ul {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-color: #000000;
        border-left-style: none;
        border-right-style: none;
        border-top-style: none;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .jelajah-event-u40semuau41 .event-lYUACE {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .frame-95-2du5Ul {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .jelajah-event-u40semuau41 .tentang-kami-nh1cl6 {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40semuau41 .profil-Sd2iYW {
        --z-index: 1;
        aspect-ratio: 1;
        background-color: transparent;
        cursor: pointer;
        height: 30.77%;
        left: 92.36%;
        opacity: 1;
        position: absolute;
        top: 33.85%;
        width: 0px;
      }

      .jelajah-event-u40semuau41 .vector-FfOBle {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-1.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: -5%;
        opacity: 1;
        position: absolute;
        top: 57.5%;
        width: 110%;
      }

      .jelajah-event-u40semuau41 .vector-xxzdKy {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-2.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: 26.25%;
        opacity: 1;
        position: absolute;
        top: -5%;
        width: 47.5%;
      }

      .jelajah-event-u40semuau41 .hero-section-tuzc6y {
        --z-index: 4;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/hero-section.png);
        background-position: 50% 50%;
        background-size: cover;
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        left: 88px;
        opacity: 1;
        overflow: hidden;
        padding: 20px 0px;
        position: absolute;
        top: 94px;
        width: 1265px;
      }

      .jelajah-event-u40semuau41 .container-wKDh9e {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 48px;
        height: 132px;
        max-width: 1536px;
        opacity: 1;
        padding: 0px 32px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .container-iv3BYm {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 16px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .heading-2-vGHM30 {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40semuau41 .jelajahi-event-nusantara-FcvfKb {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 60px;
        font-style: normal;
        font-weight: 800;
        justify-content: center;
        letter-spacing: -1.5px;
        line-height: 60px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
      }

      .jelajah-event-u40semuau41 .container-vGHM30 {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        max-width: 672px;
        opacity: 1;
        position: relative;
        width: 672px;
      }

      .jelajah-event-u40semuau41 .temukan-berbagai-aca-LrR0Ll {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        width: fit-content;
      }
      /* screen - tentang-kami */

      .tentang-kami {
        align-items: flex-start;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        height: 1454px;
        left: 0px;
        opacity: 1;
        overflow-x: hidden;
        position: relative;
        top: 0px;
      }

      .tentang-kami .group-navbar-C61RwL {
        --z-index: 0;
        background-color: transparent;
        height: 65px;
        opacity: 1;
        position: relative;
        width: 1440px;
      }

      .tentang-kami .navbar-utama-DP1VkW {
        --z-index: 0;
        background-color: transparent;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .tentang-kami .rectangle-1-a2t32t {
        --z-index: 0;
        background-color: #ffffffcc;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .tentang-kami .group-82-a2t32t {
        --z-index: 1;
        background-color: transparent;
        height: 1px;
        left: 1284px;
        opacity: 1;
        position: absolute;
        top: 16px;
        width: 1px;
      }

      .tentang-kami .logo-a2t32t {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        gap: 8px;
        left: 86px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 14px);
      }

      .tentang-kami .container-srsPWg {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .tentang-kami .svg-wu39F6 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .tentang-kami .vector-pIECLt {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .tentang-kami .heading-1-srsPWg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .tentang-kami .even-tura-dVRD8C {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .tentang-kami .frame-2-a2t32t {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        gap: 21px;
        left: calc(50% - 129px);
        opacity: 1;
        position: absolute;
        top: calc(50% - 10px);
      }

      .tentang-kami .frame-93-AWqVf7 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .tentang-kami .beranda-IV52nv {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .tentang-kami .frame-94-AWqVf7 {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .tentang-kami .event-VuxQoF {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .tentang-kami .frame-95-AWqVf7 {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-color: #000000;
        border-left-style: none;
        border-right-style: none;
        border-top-style: none;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .tentang-kami .tentang-kami-03dhao {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .tentang-kami .profil-DP1VkW {
        --z-index: 1;
        aspect-ratio: 1;
        background-color: transparent;
        cursor: pointer;
        height: 30.77%;
        left: 92.36%;
        opacity: 1;
        position: absolute;
        top: 33.85%;
        width: 0px;
      }

      .tentang-kami .vector-2e1dgV {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-1.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: -5%;
        opacity: 1;
        position: absolute;
        top: 57.5%;
        width: 110%;
      }

      .tentang-kami .vector-gjYGxX {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-2.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: 26.25%;
        opacity: 1;
        position: absolute;
        top: -5%;
        width: 47.5%;
      }

      .tentang-kami .depth-0-frame-0-C61RwL {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        height: 1389px;
        min-height: 800px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .tentang-kami .depth-1-frame-0-24uJBH {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 1389px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .depth-2-frame-1-wxw5Hm {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 10px;
        opacity: 1;
        padding: 21px 87px 21px 73px;
        position: relative;
        width: 100%;
      }

      .tentang-kami .depth-3-frame-0-S0Ej4g {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 1280px;
      }

      .tentang-kami .depth-4-frame-0-50AXrx {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .depth-5-frame-0-5gChaF {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 1;
        flex-direction: column;
        flex-grow: 1;
        opacity: 1;
        padding: 12px 0px 12px 16px;
        position: relative;
        width: 100%;
      }

      .tentang-kami .depth-6-frame-0-3GfCWI {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903646c784dca0d0e58af9d/img/depth-6--frame-0-5.svg);
        background-position: 50% 50%;
        background-size: cover;
        border-radius: 12px;
        height: 218px;
        min-height: 218px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .tentang-kami .depth-7-frame-0-L4I5xE {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        left: 176px;
        opacity: 1;
        padding: 16px;
        position: absolute;
        top: 248px;
        width: 928px;
      }

      .tentang-kami .depth-8-frame-0-Y6Hz6v {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .tentang-kami .our-story-HTV8UH {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #ffffff;
        font-family: "Plus Jakarta Sans", Helvetica;
        font-size: 28px;
        font-style: normal;
        font-weight: 700;
        letter-spacing: 0px;
        line-height: 35px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .tentang-kami-L4I5xE {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 48px;
        font-style: normal;
        font-weight: 800;
        height: 20px;
        justify-content: center;
        left: calc(50% - 179px);
        letter-spacing: 0px;
        line-height: 20px;
        opacity: 1;
        position: absolute;
        text-align: left;
        top: 89px;
        white-space: nowrap;
        width: auto;
      }

      .tentang-kami .depth-4-frame-1-50AXrx {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 16px 12px;
        position: relative;
        width: 100%;
      }

      .tentang-kami .even-tura-website-in-h5ZuSM {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #161111;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .depth-4-frame-2-50AXrx {
        --z-index: 2;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 60px;
        opacity: 1;
        padding: 20px 16px 12px;
        position: relative;
        width: 100%;
      }

      .tentang-kami .filosofi-kami-wBqEnk {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #161111;
        font-family: "Inter", Helvetica;
        font-size: 22px;
        font-style: normal;
        font-weight: 700;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .depth-4-frame-3-50AXrx {
        --z-index: 3;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 16px 12px;
        position: relative;
        width: 100%;
      }

      .tentang-kami .indonesia-dikenal-se-xc76oh {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #161111;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .depth-4-frame-8-50AXrx {
        --z-index: 4;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 60px;
        opacity: 1;
        padding: 20px 16px 12px;
        position: relative;
        width: 100%;
      }

      .tentang-kami .proses-kami-qzc6i9 {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #161111;
        font-family: "Plus Jakarta Sans", Helvetica;
        font-size: 22px;
        font-style: normal;
        font-weight: 700;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .depth-4-frame-9-50AXrx {
        --z-index: 5;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 8px;
        opacity: 1;
        padding: 0px 16px;
        position: relative;
        width: 100%;
      }

      .tentang-kami .depth-5-frame-0-CNqNuv {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 1;
        flex-grow: 1;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .depth-6-frame-0-r1tV8V {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/depth-6--frame-0-1.svg);
        background-size: 100% 100%;
        display: flex;
        flex-direction: column;
        gap: 4px;
        margin-bottom: -6px;
        opacity: 1;
        padding: 12px 0px 0px;
        position: relative;
        width: 40px;
      }

      .tentang-kami .depth-6-frame-1-r1tV8V {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 1;
        flex-direction: column;
        flex-grow: 1;
        opacity: 1;
        padding: 12px 0px;
        position: relative;
      }

      .tentang-kami .depth-7-frame-0-BtUOBa {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .pencarian-referensi-xuCOFE {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #161111;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .depth-7-frame-1-BtUOBa {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .kami-mencari-referen-uOvDzt {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #897060;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .depth-5-frame-1-CNqNuv {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 1;
        flex-grow: 1;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .depth-6-frame-0-aJFGSU {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/depth-6--frame-0-2.svg);
        background-size: 100% 100%;
        display: flex;
        flex-direction: column;
        gap: 4px;
        margin-bottom: -6px;
        opacity: 1;
        position: relative;
        width: 40px;
      }

      .tentang-kami .depth-6-frame-1-aJFGSU {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 1;
        flex-direction: column;
        flex-grow: 1;
        opacity: 1;
        padding: 12px 0px;
        position: relative;
      }

      .tentang-kami .depth-7-frame-0-CPwib3 {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .perencanaan-desain-sLRA68 {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #161111;
        font-family: "Plus Jakarta Sans", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .depth-7-frame-1-CPwib3 {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .dari-referensi-yang-5doCf2 {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #897060;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .depth-5-frame-2-CNqNuv {
        --z-index: 2;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 1;
        flex-grow: 1;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .depth-6-frame-0-okandW {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/depth-6--frame-0-3.svg);
        background-size: 100% 100%;
        display: flex;
        flex-direction: column;
        gap: 4px;
        margin-bottom: -6px;
        opacity: 1;
        position: relative;
        width: 40px;
      }

      .tentang-kami .depth-6-frame-1-okandW {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 1;
        flex-direction: column;
        flex-grow: 1;
        opacity: 1;
        padding: 12px 0px;
        position: relative;
      }

      .tentang-kami .depth-7-frame-0-bTotwY {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .pelaksanaan-pengerjaan-SMA1i6 {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #161111;
        font-family: "Plus Jakarta Sans", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .depth-7-frame-1-bTotwY {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .kami-mulai-mengerjak-tA1wyt {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #897060;
        font-family: "Plus Jakarta Sans", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .depth-5-frame-3-CNqNuv {
        --z-index: 3;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 1;
        flex-grow: 1;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .depth-6-frame-0-nuiyxx {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/depth-6--frame-0-4.svg);
        background-size: 100% 100%;
        display: flex;
        flex-direction: column;
        gap: 4px;
        opacity: 1;
        padding: 0px 0px 12px;
        position: relative;
        width: 40px;
      }

      .tentang-kami .depth-6-frame-1-nuiyxx {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 1;
        flex-direction: column;
        flex-grow: 1;
        opacity: 1;
        padding: 12px 0px;
        position: relative;
      }

      .tentang-kami .depth-7-frame-0-oxDn3Q {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .penyelesaian-desain-secara-penuh-HqQc8E {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #161111;
        font-family: "Plus Jakarta Sans", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .depth-7-frame-1-oxDn3Q {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .kami-mengerjakan-pen-ELtSYk {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #897060;
        font-family: "Plus Jakarta Sans", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .footer-utama-wxw5Hm {
        --z-index: 1;
        align-items: flex-start;
        background-color: #f5e7b2;
        display: flex;
        flex: 0 0 auto;
        flex-wrap: wrap;
        gap: 0px 209px;
        opacity: 1;
        padding: 22px 87px;
        position: relative;
        width: 1440px;
      }

      .tentang-kami .frame-logo-hShA4c {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 4px;
        opacity: 1;
        position: relative;
        width: 618px;
      }

      .tentang-kami .logo-VmE75h {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
      }

      .tentang-kami .container-xi6PTE {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .tentang-kami .svg-EJ6hBp {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .tentang-kami .vector-YDK1t0 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .tentang-kami .heading-1-xi6PTE {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .tentang-kami .even-tura-dSRByr {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .tentang-kami .website-yang-berfung-VmE75h {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .nav-hShA4c {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 60px;
        opacity: 1;
        position: relative;
      }

      .tentang-kami .container-QQ1GGB {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 12px;
        height: 156px;
        min-width: 102.83999633789062px;
        opacity: 1;
        position: relative;
        width: 102.83999633789062px;
      }

      .tentang-kami .link-7blFLR {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .tentang-kami .navigasi-sE7Rrr {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #973131cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .tentang-kami .link-WtBLwh {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .tentang-kami .beranda-pZKUT4 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .tentang-kami .link-HMOx67 {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .tentang-kami .event-kcIvlu {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .tentang-kami .link-Stuv4p {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .tentang-kami .tentang-HuB73o {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .tentang-kami .container-sNFGxt {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 16px;
        height: 156px;
        opacity: 1;
        position: relative;
        width: 275.3299865722656px;
      }

      .tentang-kami .heading-3margin-umkU3T {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 0px 8px;
        position: relative;
        width: 100%;
      }

      .tentang-kami .heading-3-Nimsnl {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .contact-wQB2ia {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #973131;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .tentang-kami .container-umkU3T {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 12px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .link-fvfErp {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .svg-IJlLKH {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .tentang-kami .vector-xrDnxO {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-4.svg);
        background-size: 100% 100%;
        height: 91.37%;
        left: 4.63%;
        opacity: 1;
        position: absolute;
        top: 4.16%;
        width: 91.2%;
      }

      .tentang-kami .container-IJlLKH {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .tentang-kami .x1-234-567-890-XZTdmt {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .tentang-kami .link-TD9rvn {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .tentang-kami .svg-xixMnH {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .tentang-kami .vector-ipnCLz {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-5.svg);
        background-size: 100% 100%;
        height: 75%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 12.5%;
        width: 91.67%;
      }

      .tentang-kami .vector-836UyJ {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-6.svg);
        background-size: 100% 100%;
        height: 33.32%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 25%;
        width: 91.67%;
      }

      .tentang-kami .container-xixMnH {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        margin-right: -0.67px;
        opacity: 1;
        position: relative;
      }

      .tentang-kami .contactislandeventscom-24wwI1 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .tentang-kami .frame-bawah-hShA4c {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .tentang-kami .horizontal-border-xlKVyc {
        --z-index: 0;
        background-color: transparent;
        border-bottom-style: none;
        border-color: #97313133;
        border-left-style: none;
        border-right-style: none;
        border-top-style: solid;
        border-top-width: 1px;
        height: 57px;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .tentang-kami .container-8Rlgia {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/container.svg);
        background-size: 100% 100%;
        display: inline-flex;
        gap: 24px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 6px);
      }

      .tentang-kami .container-hlFe0W {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: 983px;
        opacity: 1;
        position: absolute;
        top: calc(50% + 8px);
      }

      .tentang-kami .x2024-island-events-all-rights-reserved-zUxKHz {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #00000099;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }
      /* screen - page-event-yang-disukai */

      .page-event-yang-disukai {
        align-items: flex-start;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        height: 1184px;
        left: 0px;
        opacity: 1;
        overflow-x: hidden;
        position: relative;
        top: 0px;
      }

      .page-event-yang-disukai .group-navbar-C61RwL {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 65px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .navbar-utama-DP1VkW {
        --z-index: 0;
        background-color: transparent;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .page-event-yang-disukai .rectangle-1-a2t32t {
        --z-index: 0;
        background-color: #ffffffcc;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .page-event-yang-disukai .group-82-a2t32t {
        --z-index: 1;
        background-color: transparent;
        height: 1px;
        left: 1284px;
        opacity: 1;
        position: absolute;
        top: 16px;
        width: 1px;
      }

      .page-event-yang-disukai .logo-a2t32t {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        gap: 8px;
        left: 86px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 14px);
      }

      .page-event-yang-disukai .container-srsPWg {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .page-event-yang-disukai .svg-wu39F6 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .page-event-yang-disukai .vector-pIECLt {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .page-event-yang-disukai .heading-1-srsPWg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-disukai .even-tura-dVRD8C {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .frame-2-a2t32t {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        gap: 21px;
        left: calc(50% - 129px);
        opacity: 1;
        position: absolute;
        top: calc(50% - 10px);
      }

      .page-event-yang-disukai .frame-93-AWqVf7 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .page-event-yang-disukai .beranda-IV52nv {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .frame-94-AWqVf7 {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .page-event-yang-disukai .event-VuxQoF {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .frame-95-AWqVf7 {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .page-event-yang-disukai .tentang-kami-03dhao {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .profil-DP1VkW {
        --z-index: 1;
        aspect-ratio: 1;
        background-color: transparent;
        cursor: pointer;
        height: 30.77%;
        left: 92.36%;
        opacity: 1;
        position: absolute;
        top: 33.85%;
        width: 0px;
      }

      .page-event-yang-disukai .vector-2e1dgV {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-1.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: -5%;
        opacity: 1;
        position: absolute;
        top: 57.5%;
        width: 110%;
      }

      .page-event-yang-disukai .vector-gjYGxX {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-2.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: 26.25%;
        opacity: 1;
        position: absolute;
        top: -5%;
        width: 47.5%;
      }

      .page-event-yang-disukai .container-C61RwL {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 1119px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .link-tuzc6y {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        border-radius: 12px;
        display: flex;
        gap: 12px;
        height: 40px;
        justify-content: center;
        left: 142px;
        opacity: 1;
        padding: 6px 16px;
        position: absolute;
        top: 372px;
        width: 165px;
      }

      .page-event-yang-disukai .container-dYHTc4 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-disukai .icon-ZikfZo {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 24.020000457763672px;
      }

      .page-event-yang-disukai .vector-6kvM35 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-9.svg);
        background-size: 100% 100%;
        height: 62.5%;
        left: 13.57%;
        opacity: 1;
        position: absolute;
        top: 18.75%;
        width: 72.86%;
      }

      .page-event-yang-disukai .container-CxwvYq {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-disukai .logout-PQP71D {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #1f2937;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .mainmargin-tuzc6y {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        height: 862px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .main-xXn3Dd {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        gap: 20px;
        height: 862px;
        left: 0px;
        opacity: 1;
        padding: 44px 0px 86px 89px;
        position: relative;
        top: 0px;
        width: 100%;
      }

      .page-event-yang-disukai .background-shadow-M7OuBP {
        --z-index: 0;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0px 5px 2px #0000000d;
        height: 324px;
        opacity: 1;
        position: relative;
        width: 272px;
      }

      .page-event-yang-disukai .container-TkGOxU {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: calc(50% - 100px);
        opacity: 1;
        position: absolute;
        top: 176px;
      }

      .page-event-yang-disukai .heading-1-PGizWL {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .fadiyah-FIVWdu {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #1c1917;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 24px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 32px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .container-PGizWL {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .penggemar-seni-budaya-x27PP2 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #57534e;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .container-g9xb1E {
        --z-index: 2;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 0px 0px;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .pengguna-s7q6ZA {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #78716c;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .button-TkGOxU {
        --z-index: 1;
        align-items: center;
        background-color: #b31919;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        left: 24px;
        opacity: 1;
        padding: 10px 16px;
        position: absolute;
        top: 280px;
        width: calc(100% - 48px);
      }

      .page-event-yang-disukai .edit-profil-iIkd5c {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .container-CPZfq6 {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/container-3.svg);
        background-size: 100% 100%;
        display: inline-flex;
        flex-direction: column;
        left: calc(50% - 64px);
        opacity: 1;
        position: absolute;
        top: 24px;
      }

      .page-event-yang-disukai .container-M7OuBP {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 30px;
        height: 818px;
        margin-bottom: -86px;
        opacity: 1;
        position: relative;
        width: 974px;
      }

      .page-event-yang-disukai .horizontal-border-8ckstU {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-color: #e7e5e4;
        border-left-style: none;
        border-right-style: none;
        border-top-style: none;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .nav-tabs-N4eFvZ {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        opacity: 1;
        padding: 0px 16px;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .link-ktwL6R {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 16px 4px 18px;
        position: relative;
      }

      .page-event-yang-disukai .event-favorit-fptWRS {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #78716c;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -2px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .linkmargin-ktwL6R {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 0px 0px 0px 32px;
        position: relative;
      }

      .page-event-yang-disukai .link-CGKJSf {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        border-bottom-style: solid;
        border-bottom-width: 2px;
        border-color: #b31919;
        border-left-style: none;
        border-right-style: none;
        border-top-style: none;
        display: inline-flex;
        flex-direction: column;
        height: 54px;
        opacity: 1;
        padding: 16px 4px 18px;
        position: relative;
      }

      .page-event-yang-disukai .event-yang-disukai-nfnWeb {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -2px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .linkmargin-9Kwlq7 {
        --z-index: 2;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 0px 0px 0px 32px;
        position: relative;
      }

      .page-event-yang-disukai .link-XcrBB4 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        height: 54px;
        opacity: 1;
        padding: 16px 4px 18px;
        position: relative;
      }

      .page-event-yang-disukai .pengaturan-akun-Uw1yFZ {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #78716c;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .hader-event-yang-disukai-8ckstU {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 896px;
      }

      .page-event-yang-disukai .event-yang-disukai-OBixeq {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 30px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 36px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .container-event-8ckstU {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 25px;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-disukai .container-xOfH1k {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 318px;
        opacity: 1;
        position: relative;
        width: 205px;
      }

      .page-event-yang-disukai .background-TER5tk {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: #e5e7eb;
        border-radius: 8px;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .festival-tari-tradisional-TC3iyO {
        --z-index: 0;
        background-color: transparent;
        height: 262px;
        max-width: 206px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .weuilike-outlined-AFl44B {
        --z-index: 0;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/weui-like-outlined.svg);
        background-size: 100% 100%;
        height: 28px;
        left: 174px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 28px;
      }

      .page-event-yang-disukai .container-TER5tk {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 4px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .heading-3-link-I5TMxM {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 184.47000122070312px;
      }

      .page-event-yang-disukai .gandrung-sewu-8MH7q5 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #1f2937;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .container-I5TMxM {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .banyuwangi-23-oktober-2025-o8VCb9 {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-disukai .container-QCdsnP {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 318px;
        opacity: 1;
        position: relative;
        width: 205px;
      }

      .page-event-yang-disukai .background-xiHfBW {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: #e5e7eb;
        border-radius: 8px;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .konser-musik-daerah-H0C7tF {
        --z-index: 0;
        background-color: transparent;
        height: 262px;
        max-width: 206px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .weuilike-outlined-Gulp76 {
        --z-index: 0;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/weui-like-outlined-1@2x.png);
        background-size: 100% 100%;
        height: 28px;
        left: 174px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 28px;
      }

      .page-event-yang-disukai .weuilike-outlined-i3keDx {
        --z-index: 1;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/weui-like-outlined.svg);
        background-size: 100% 100%;
        height: 28px;
        left: 174px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 28px;
      }

      .page-event-yang-disukai .container-xiHfBW {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 4px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .heading-3-link-6x6bFX {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 166.61000061035156px;
      }

      .page-event-yang-disukai .sawahlunto-internasional-9QeAhk {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #1f2937;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-right: -39.39px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .container-6x6bFX {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .sawahlunto-10-oktober-2025-MDzMCE {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-disukai .container-xDp9wi {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 318px;
        opacity: 1;
        position: relative;
        width: 205px;
      }

      .page-event-yang-disukai .background-xf8R1z {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: #e5e7eb;
        border-radius: 8px;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .pameran-seni-rupa-lYb07m {
        --z-index: 0;
        background-color: transparent;
        height: 262px;
        max-width: 206px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .weuilike-outlined-Un9NCc {
        --z-index: 0;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/weui-like-outlined.svg);
        background-size: 100% 100%;
        height: 28px;
        left: 174px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 28px;
      }

      .page-event-yang-disukai .container-xf8R1z {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 4px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .heading-3-link-l4ET6j {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 151.02000427246094px;
      }

      .page-event-yang-disukai .art-jakarta-pbxxVf {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #1f2937;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .container-l4ET6j {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .jakarta-3-oktober-2025-GXvM30 {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-disukai .footer-utama-tuzc6y {
        --z-index: 2;
        align-items: flex-start;
        background-color: #f5e7b2;
        display: flex;
        flex: 0 0 auto;
        flex-wrap: wrap;
        gap: 0px 209px;
        opacity: 1;
        padding: 22px 87px;
        position: relative;
        width: 1440px;
      }

      .page-event-yang-disukai .frame-logo-Z3xR4w {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 4px;
        opacity: 1;
        position: relative;
        width: 618px;
      }

      .page-event-yang-disukai .logo-6shg9x {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-disukai .container-wMWPLg {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .page-event-yang-disukai .svg-Wf9oC3 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .page-event-yang-disukai .vector-gfweEi {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .page-event-yang-disukai .heading-1-wMWPLg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-disukai .even-tura-qxdkx3 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .website-yang-berfung-6shg9x {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-disukai .nav-Z3xR4w {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 60px;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-disukai .container-b1OrHs {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 12px;
        height: 156px;
        min-width: 102.83999633789062px;
        opacity: 1;
        position: relative;
        width: 102.83999633789062px;
      }

      .page-event-yang-disukai .link-TVoVcd {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-disukai .navigasi-QgQI94 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #973131cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .link-i7hCqD {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-disukai .beranda-xTQRpQ {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .link-lHL0Py {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-disukai .event-wQp7mC {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .link-DnfJsR {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-disukai .tentang-lPxg6h {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .container-Hh7C27 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 16px;
        height: 156px;
        opacity: 1;
        position: relative;
        width: 275.3299865722656px;
      }

      .page-event-yang-disukai .heading-3margin-Ejex1t {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 0px 8px;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .heading-3-H9Uiai {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .contact-iwYwCx {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #973131;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-disukai .container-Ejex1t {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 12px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .link-fP14VL {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .svg-5Ei1Vk {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .page-event-yang-disukai .vector-U8dFz2 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-11.svg);
        background-size: 100% 100%;
        height: 91.37%;
        left: 4.63%;
        opacity: 1;
        position: absolute;
        top: 4.16%;
        width: 91.2%;
      }

      .page-event-yang-disukai .container-5Ei1Vk {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-disukai .x1-234-567-890-CeFPzB {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .link-X81PwD {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-disukai .svg-q7jzOK {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .page-event-yang-disukai .vector-E8HFz8 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-12.svg);
        background-size: 100% 100%;
        height: 75%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 12.5%;
        width: 91.67%;
      }

      .page-event-yang-disukai .vector-r22zY7 {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-13.svg);
        background-size: 100% 100%;
        height: 33.32%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 25%;
        width: 91.67%;
      }

      .page-event-yang-disukai .container-q7jzOK {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        margin-right: -0.67px;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-disukai .contactislandeventscom-5oHJjz {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-disukai .frame-bawah-Z3xR4w {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .page-event-yang-disukai .horizontal-border-DwXFyv {
        --z-index: 0;
        background-color: transparent;
        border-bottom-style: none;
        border-color: #97313133;
        border-left-style: none;
        border-right-style: none;
        border-top-style: solid;
        border-top-width: 1px;
        height: 57px;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .page-event-yang-disukai .container-6UNnxL {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/container.svg);
        background-size: 100% 100%;
        display: inline-flex;
        gap: 24px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 6px);
      }

      .page-event-yang-disukai .container-enQ1rg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: 983px;
        opacity: 1;
        position: absolute;
        top: calc(50% + 8px);
      }

      .page-event-yang-disukai .x2024-island-events-all-rights-reserved-M7zUcX {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #00000099;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }
      /* screen - detail-event */

      .detail-event {
        background-color: #ffffff;
        margin: 0px;
        min-height: 1998px;
        min-width: 1440px;
        opacity: 1;
        overflow: hidden;
        overflow-x: hidden;
        position: relative;
        width: 100%;
      }

      .detail-event .footer-utama-C61RwL {
        --z-index: 0;
        align-items: flex-start;
        background-color: #f5e7b2;
        display: flex;
        flex-wrap: wrap;
        gap: 0px 209px;
        left: 0px;
        opacity: 1;
        padding: 22px 87px;
        position: absolute;
        top: 1741px;
        width: 1440px;
      }

      .detail-event .frame-logo-3eZSOx {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 4px;
        opacity: 1;
        position: relative;
        width: 618px;
      }

      .detail-event .logo-Pgxc7x {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
      }

      .detail-event .container-sUvk8b {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .detail-event .svg-VQyxHR {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .detail-event .vector-ejE7rO {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .detail-event .heading-1-sUvk8b {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .detail-event .even-tura-IpDSj6 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .website-yang-berfung-Pgxc7x {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .detail-event .nav-3eZSOx {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 60px;
        opacity: 1;
        position: relative;
      }

      .detail-event .container-RZeYIV {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 12px;
        height: 156px;
        min-width: 102.83999633789062px;
        opacity: 1;
        position: relative;
        width: 102.83999633789062px;
      }

      .detail-event .link-mWGqFj {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .detail-event .navigasi-wNQZ9O {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #973131cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .link-fWKIJf {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .detail-event .beranda-Mrxkqc {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .link-I6ZvsF {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .detail-event .event-wGx39P {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .link-hKxgom {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .detail-event .tentang-9hpzZF {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .container-Y6woBX {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 16px;
        height: 156px;
        opacity: 1;
        position: relative;
        width: 275.3299865722656px;
      }

      .detail-event .heading-3margin-51t4qf {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 0px 8px;
        position: relative;
        width: 100%;
      }

      .detail-event .heading-3-gPjpGW {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .detail-event .contact-K7WKxQ {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #973131;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .detail-event .container-51t4qf {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 12px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .detail-event .link-L2i7IC {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .detail-event .svg-rqKBhx {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .detail-event .vector-0kQQsO {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-32.svg);
        background-size: 100% 100%;
        height: 91.37%;
        left: 4.63%;
        opacity: 1;
        position: absolute;
        top: 4.16%;
        width: 91.2%;
      }

      .detail-event .container-rqKBhx {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .detail-event .x1-234-567-890-ZVOhKv {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .link-v8VhXO {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .detail-event .svg-t1txZ5 {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .detail-event .vector-hcsrO5 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-33.svg);
        background-size: 100% 100%;
        height: 75%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 12.5%;
        width: 91.67%;
      }

      .detail-event .vector-JQBuDP {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-13.svg);
        background-size: 100% 100%;
        height: 33.32%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 25%;
        width: 91.67%;
      }

      .detail-event .container-t1txZ5 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        margin-right: -0.67px;
        opacity: 1;
        position: relative;
      }

      .detail-event .contactislandeventscom-A8kzgc {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .frame-bawah-3eZSOx {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .detail-event .horizontal-border-6CnNgz {
        --z-index: 0;
        background-color: transparent;
        border-bottom-style: none;
        border-color: #97313133;
        border-left-style: none;
        border-right-style: none;
        border-top-style: solid;
        border-top-width: 1px;
        height: 57px;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .detail-event .container-ACU6MY {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/container.svg);
        background-size: 100% 100%;
        display: inline-flex;
        gap: 24px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 6px);
      }

      .detail-event .container-TZinLO {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: 983px;
        opacity: 1;
        position: absolute;
        top: calc(50% + 8px);
      }

      .detail-event .x2024-island-events-all-rights-reserved-MVia0s {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #00000099;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .frame-90-C61RwL {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 36px;
        left: calc(50% - 503px);
        opacity: 1;
        position: absolute;
        top: 1152px;
        width: 1005px;
      }

      .detail-event .ulasan-vo1VF3 {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #000000;
        font-family: "Montserrat", Helvetica;
        font-size: 36px;
        font-style: normal;
        font-weight: 700;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .detail-event .rectangle-152-vo1VF3 {
        --z-index: 1;
        background-color: transparent;
        height: 100px;
        opacity: 1;
        position: relative;
        width: 1005px;
      }

      .detail-event .rectangle-152-RL1LtC {
        --z-index: 0;
        background-color: transparent;
        border: 1px solid;
        border-color: #000000;
        border-radius: 20px;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .detail-event .supri-RL1LtC {
        --z-index: 1;
        background-color: transparent;
        color: #000000;
        font-family: "Montserrat", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        height: 16%;
        left: 8.26%;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: left;
        top: 14%;
        white-space: nowrap;
        width: 5.97%;
      }

      .detail-event .x7-agustus-2021-RL1LtC {
        --z-index: 2;
        background-color: transparent;
        color: #e0a75e;
        font-family: "Montserrat", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        height: 12%;
        left: 8.26%;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: left;
        top: 32%;
        white-space: nowrap;
        width: 9.35%;
      }

      .detail-event .lorem-ipsum-dolor-si-RL1LtC {
        --z-index: 3;
        background-color: transparent;
        color: #000000;
        font-family: "Montserrat", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        height: 48%;
        left: 8.26%;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: left;
        top: 57%;
        width: 87.26%;
      }

      .detail-event .frame-91-RL1LtC {
        --z-index: 4;
        align-items: center;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/frame-91.svg);
        background-size: 100% 100%;
        display: inline-flex;
        left: 860px;
        opacity: 1;
        position: absolute;
        top: 30px;
      }

      .detail-event .rectangle-153-RL1LtC {
        --z-index: 5;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/rectangle-153@2x.png);
        background-size: 100% 100%;
        height: 35px;
        left: 29px;
        object-fit: cover;
        opacity: 1;
        position: absolute;
        top: 13px;
        width: 35px;
      }

      .detail-event .rectangle-152-mAHt2K {
        --z-index: 2;
        background-color: transparent;
        height: 100px;
        opacity: 1;
        position: relative;
        width: 1005px;
      }

      .detail-event .rectangle-152-KxqkxL {
        --z-index: 0;
        background-color: transparent;
        border: 1px solid;
        border-color: #000000;
        border-radius: 20px;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .detail-event .supri-KxqkxL {
        --z-index: 1;
        background-color: transparent;
        color: #000000;
        font-family: "Montserrat", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        height: 16%;
        left: 8.26%;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: left;
        top: 14%;
        white-space: nowrap;
        width: 5.97%;
      }

      .detail-event .x7-agustus-2021-KxqkxL {
        --z-index: 2;
        background-color: transparent;
        color: #e0a75e;
        font-family: "Montserrat", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        height: 12%;
        left: 8.26%;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: left;
        top: 32%;
        white-space: nowrap;
        width: 9.35%;
      }

      .detail-event .lorem-ipsum-dolor-si-KxqkxL {
        --z-index: 3;
        background-color: transparent;
        color: #000000;
        font-family: "Montserrat", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        height: 48%;
        left: 8.26%;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: left;
        top: 57%;
        width: 87.26%;
      }

      .detail-event .frame-91-KxqkxL {
        --z-index: 4;
        align-items: center;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/frame-91.svg);
        background-size: 100% 100%;
        display: inline-flex;
        left: 860px;
        opacity: 1;
        position: absolute;
        top: 30px;
      }

      .detail-event .rectangle-153-KxqkxL {
        --z-index: 5;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/rectangle-153@2x.png);
        background-size: 100% 100%;
        height: 35px;
        left: 29px;
        object-fit: cover;
        opacity: 1;
        position: absolute;
        top: 13px;
        width: 35px;
      }

      .detail-event .rectangle-152-KGxbYv {
        --z-index: 3;
        background-color: transparent;
        height: 100px;
        opacity: 1;
        position: relative;
        width: 1005px;
      }

      .detail-event .rectangle-152-VxT6qF {
        --z-index: 0;
        background-color: transparent;
        border: 1px solid;
        border-color: #000000;
        border-radius: 20px;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .detail-event .supri-VxT6qF {
        --z-index: 1;
        background-color: transparent;
        color: #000000;
        font-family: "Montserrat", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        height: 16%;
        left: 8.26%;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: left;
        top: 14%;
        white-space: nowrap;
        width: 5.97%;
      }

      .detail-event .x7-agustus-2021-VxT6qF {
        --z-index: 2;
        background-color: transparent;
        color: #e0a75e;
        font-family: "Montserrat", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 700;
        height: 12%;
        left: 8.26%;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: left;
        top: 32%;
        white-space: nowrap;
        width: 9.35%;
      }

      .detail-event .lorem-ipsum-dolor-si-VxT6qF {
        --z-index: 3;
        background-color: transparent;
        color: #000000;
        font-family: "Montserrat", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        height: 48%;
        left: 8.26%;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: absolute;
        text-align: left;
        top: 57%;
        width: 87.26%;
      }

      .detail-event .frame-91-VxT6qF {
        --z-index: 4;
        align-items: center;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/frame-91.svg);
        background-size: 100% 100%;
        display: inline-flex;
        left: 860px;
        opacity: 1;
        position: absolute;
        top: 30px;
      }

      .detail-event .rectangle-153-VxT6qF {
        --z-index: 5;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/rectangle-153@2x.png);
        background-size: 100% 100%;
        height: 35px;
        left: 29px;
        object-fit: cover;
        opacity: 1;
        position: absolute;
        top: 13px;
        width: 35px;
      }

      .detail-event .frame-88-C61RwL {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        gap: 55px;
        left: 362px;
        opacity: 1;
        position: absolute;
        top: 951px;
      }

      .detail-event .background-FKNjej {
        --z-index: 0;
        background-color: #f5e7b2;
        border-radius: 12px;
        height: 148px;
        opacity: 1;
        position: relative;
        width: 331px;
      }

      .detail-event .margin-l2A9z7 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: 20px;
        opacity: 1;
        padding: 4px 0px 0px;
        position: absolute;
        top: 22px;
      }

      .detail-event .container-PlKXFX {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .detail-event .icon-GSamDi {
        --z-index: 0;
        background-color: transparent;
        height: 36px;
        opacity: 1;
        position: relative;
        width: 30px;
      }

      .detail-event .vector-LZ4XhX {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-35.svg);
        background-size: 100% 100%;
        height: 69.44%;
        left: 12.5%;
        opacity: 1;
        position: absolute;
        top: 15.28%;
        width: 75%;
      }

      .detail-event .container-l2A9z7 {
        --z-index: 1;
        background-color: transparent;
        height: 76px;
        left: 69px;
        opacity: 1;
        position: absolute;
        top: 28px;
        width: 163px;
      }

      .detail-event .heading-3-s0JyA5 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .detail-event .tanggal-waktu-xz3p6n {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .container-s0JyA5 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 28px;
        width: 100%;
      }

      .detail-event .setiap-hari-lWKEuf {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .container-m0yVWU {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 52px;
        width: calc(100% - 23px);
      }

      .detail-event .x1800-wita-1900-wita-ugAevv {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #e0a75e;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        width: fit-content;
      }

      .detail-event .background-hP63OY {
        --z-index: 1;
        background-color: #f5e7b2;
        border-radius: 12px;
        height: 148px;
        opacity: 1;
        position: relative;
        width: 330px;
      }

      .detail-event .margin-ZGgE2v {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 40px;
        left: 21px;
        opacity: 1;
        padding: 4px 0px 0px;
        position: absolute;
        top: 22px;
        width: 30px;
      }

      .detail-event .container-5y9hVj {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .detail-event .icon-XsTWhD {
        --z-index: 0;
        background-color: transparent;
        height: 36px;
        opacity: 1;
        position: relative;
        width: 30px;
      }

      .detail-event .vector-b6rxVz {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-36.svg);
        background-size: 100% 100%;
        height: 69.44%;
        left: 16.67%;
        opacity: 1;
        position: absolute;
        top: 15.28%;
        width: 66.67%;
      }

      .detail-event .container-ZGgE2v {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: calc(50% - 104px);
        min-width: 183.3300018310547px;
        opacity: 1;
        position: absolute;
        top: 26px;
      }

      .detail-event .heading-3-xuLxxx {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .detail-event .lokasi-rmTTen {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .container-xuLxxx {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 184px;
      }

      .detail-event .pura-uluwatu-pantai-melasti-zOgrWp {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-right: -32px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .container-NJvg78 {
        --z-index: 2;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .detail-event .bali-indonesia-7yNalo {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #e0a75e;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .frame-87-C61RwL {
        --z-index: 3;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 18px;
        height: 243px;
        left: 89px;
        opacity: 1;
        position: absolute;
        top: 655px;
        width: 833px;
      }

      .detail-event .tari-kecak-V6dEk7 {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        color: #000000;
        font-family: "Montserrat", Helvetica;
        font-size: 40px;
        font-style: normal;
        font-weight: 700;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .detail-event .tari-kecak-adalah-pe-V6dEk7 {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        color: #000000;
        font-family: "Inter", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .detail-event .frame-89-C61RwL {
        --z-index: 4;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 10px;
        left: 88px;
        opacity: 1;
        position: absolute;
        top: 898px;
        width: 1265px;
      }

      .detail-event .line-53-BXRxMX {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/line-53.svg);
        background-size: 100% 100%;
        height: 1px;
        margin-top: -1px;
        object-fit: cover;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .detail-event .container-C61RwL {
        --z-index: 5;
        align-items: flex-start;
        aspect-ratio: 2.290909;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 12px;
        height: 145px;
        left: 1023px;
        opacity: 1;
        position: absolute;
        top: 656px;
        width: 331px;
      }

      .detail-event .button-tuzc6y {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: #973131;
        border-radius: 12px;
        display: flex;
        gap: 8px;
        height: 60px;
        justify-content: center;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .detail-event .tambahkan-ke-favorit-8IlxlK {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .button-SzHptm {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: #f5e7b2;
        border: 1px solid;
        border-color: #e0a75e;
        border-radius: 12px;
        display: flex;
        gap: 8px;
        height: 60px;
        justify-content: center;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .detail-event .container-eB1mwJ {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .detail-event .icon-j5vKw7 {
        --z-index: 0;
        background-color: transparent;
        height: 27.98834228515625px;
        opacity: 1;
        position: relative;
        width: 24.010000228881836px;
      }

      .detail-event .vector-xxzcrh {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-37.svg);
        background-size: 100% 100%;
        height: 69.44%;
        left: 9.52%;
        opacity: 1;
        position: absolute;
        top: 15.28%;
        width: 72.86%;
      }

      .detail-event .bagikan-eB1mwJ {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        color: #000000;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .group-navbar-C61RwL {
        --z-index: 6;
        background-color: transparent;
        height: 65px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 1440px;
      }

      .detail-event .navbar-utama-DP1VkW {
        --z-index: 0;
        background-color: transparent;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .detail-event .rectangle-1-a2t32t {
        --z-index: 0;
        background-color: #ffffffcc;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .detail-event .group-82-a2t32t {
        --z-index: 1;
        background-color: transparent;
        height: 1px;
        left: 1284px;
        opacity: 1;
        position: absolute;
        top: 16px;
        width: 1px;
      }

      .detail-event .logo-a2t32t {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        gap: 8px;
        left: 86px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 14px);
      }

      .detail-event .container-srsPWg {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .detail-event .svg-wu39F6 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .detail-event .vector-pIECLt {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .detail-event .heading-1-srsPWg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .detail-event .even-tura-dVRD8C {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .frame-2-a2t32t {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        gap: 21px;
        left: calc(50% - 129px);
        opacity: 1;
        position: absolute;
        top: calc(50% - 10px);
      }

      .detail-event .frame-93-AWqVf7 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .detail-event .beranda-IV52nv {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .frame-94-AWqVf7 {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-color: #000000;
        border-left-style: none;
        border-right-style: none;
        border-top-style: none;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .detail-event .event-VuxQoF {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .frame-95-AWqVf7 {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .detail-event .tentang-kami-03dhao {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .profil-DP1VkW {
        --z-index: 1;
        aspect-ratio: 1;
        background-color: transparent;
        cursor: pointer;
        height: 30.77%;
        left: 92.36%;
        opacity: 1;
        position: absolute;
        top: 33.85%;
        width: 0px;
      }

      .detail-event .vector-2e1dgV {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-1.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: -5%;
        opacity: 1;
        position: absolute;
        top: 57.5%;
        width: 110%;
      }

      .detail-event .vector-gjYGxX {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-2.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: 26.25%;
        opacity: 1;
        position: absolute;
        top: -5%;
        width: 47.5%;
      }

      .detail-event .frame-89-VMr6Om {
        --z-index: 7;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 20px;
        left: 88px;
        opacity: 1;
        position: absolute;
        top: 139px;
        width: 1265px;
      }

      .detail-event .container-vs79GK {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .detail-event .link-aSQ0DE {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .detail-event .event-YOtCts {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #e0a75e;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .margin-aSQ0DE {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 0px 0px 9px;
        position: relative;
      }

      .detail-event .container-KSdUXU {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 2px 0px;
        position: relative;
      }

      .detail-event .icon-WODoIr {
        --z-index: 0;
        background-color: transparent;
        height: 16px;
        opacity: 1;
        position: relative;
        width: 14.020000457763672px;
      }

      .detail-event .vector-9Orhxb {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-41.svg);
        background-size: 100% 100%;
        height: 41.66%;
        left: 34.15%;
        opacity: 1;
        position: absolute;
        top: 29.17%;
        width: 29.32%;
      }

      .detail-event .margin-cM5vAy {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 0px 0px 8px;
        position: relative;
      }

      .detail-event .tari-kecak-Oy8Qap {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .detail-event .frame-86-vs79GK {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        height: 453px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .detail-event .rectangle-151-zCeYVr {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/rectangle-151.png);
        background-size: 100% 100%;
        height: 433px;
        left: 0px;
        object-fit: cover;
        opacity: 1;
        position: absolute;
        top: 10px;
        width: 605px;
      }

      .detail-event .rectangle-151-HbpjXC {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/rectangle-151-2.png);
        background-size: 100% 100%;
        height: 201px;
        left: 661px;
        opacity: 1;
        position: absolute;
        top: 10px;
        width: 604px;
      }

      .detail-event .rectangle-151-fQXu42 {
        --z-index: 2;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/rectangle-151-1.png);
        background-size: 100% 100%;
        height: 201px;
        left: 661px;
        opacity: 1;
        position: absolute;
        top: 242px;
        width: 604px;
      }

      .detail-event .weuilike-outlined-zCeYVr {
        --z-index: 3;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/weui-like-outlined-4.svg);
        background-size: 100% 100%;
        height: 28px;
        left: 561px;
        opacity: 1;
        position: absolute;
        top: 19px;
        width: 28px;
      }
      /* screen - jelajah-event-u40budayau41 */

      .jelajah-event-u40budayau41 {
        align-items: flex-start;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        height: 1133px;
        left: 0px;
        opacity: 1;
        overflow-x: hidden;
        position: relative;
        top: 0px;
      }

      .jelajah-event-u40budayau41 .container-C61RwL {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 1133px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .container-search-tuzc6y {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: flex;
        justify-content: space-between;
        left: 88px;
        opacity: 1;
        position: absolute;
        top: 325px;
        width: 1265px;
      }

      .jelajah-event-u40budayau41 .container-8j71Q9 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: flex;
        justify-content: space-between;
        opacity: 1;
        position: relative;
        width: 1265px;
        z-index: 1;
      }

      .jelajah-event-u40budayau41 .container-t4RqfS {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        max-width: 512px;
        opacity: 1;
        position: relative;
        width: 512px;
        z-index: 1;
      }

      .jelajah-event-u40budayau41 .input-AdN2HU {
        --z-index: 0;
        align-self: stretch;
        background-color: #ffffff;
        border: 1px solid;
        border-color: #d1d5db;
        border-radius: 9999px;
        height: 50px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .container-alhvuH {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        left: 49px;
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 15px;
        width: calc(100% - 81px);
      }

      .jelajah-event-u40budayau41 .cari-event-8fHkYM {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .container-eMoxEz {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: flex;
        left: 49px;
        opacity: 1;
        position: absolute;
        top: 13px;
        width: calc(100% - 66px);
      }

      .jelajah-event-u40budayau41 .container-mx8Hr6 {
        --z-index: 0;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        height: 24px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .margin-mx8Hr6 {
        --z-index: 1;
        background-color: transparent;
        height: 11px;
        opacity: 1;
        position: relative;
        width: 15px;
      }

      .jelajah-event-u40budayau41 .container-AdN2HU {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        height: 100%;
        left: 0px;
        opacity: 1;
        padding: 0px 0px 0px 16px;
        position: absolute;
        top: 0px;
      }

      .jelajah-event-u40budayau41 .container-3GC9fT {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .icon-Pf8sqO {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 24.020000457763672px;
      }

      .jelajah-event-u40budayau41 .vector-C4rN2A {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-23.svg);
        background-size: 100% 100%;
        height: 62.5%;
        left: 13.57%;
        opacity: 1;
        position: absolute;
        top: 18.75%;
        width: 72.86%;
      }

      .jelajah-event-u40budayau41 .container-c4zroR {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        z-index: 0;
      }

      .jelajah-event-u40budayau41 .background-border-IGoxOx {
        --z-index: 0;
        align-items: center;
        background-color: #ffffff;
        border: 1px solid;
        border-color: #d1d5db;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        opacity: 1;
        padding: 5px;
        position: relative;
      }

      .jelajah-event-u40budayau41 .button-xMOCxz {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        border-radius: 9999px;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40budayau41 .semua-1Ry6KE {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .button-Lwwq8d {
        --z-index: 1;
        align-items: center;
        background-color: #b31919;
        border-radius: 30px;
        display: flex;
        gap: 10px;
        height: 36px;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
        width: 82px;
      }

      .jelajah-event-u40budayau41 .budaya-Vq0vsx {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .button-0ad3qG {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        border-radius: 9999px;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40budayau41 .musik-aTuQ1t {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .button-8OhA1c {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        border-radius: 9999px;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40budayau41 .seni-M4pZ78 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .container-XZM1Sb {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        margin-left: -304px;
        opacity: 1;
        position: relative;
        z-index: 0;
      }

      .jelajah-event-u40budayau41 .background-border-wwzARh {
        --z-index: 0;
        align-items: center;
        background-color: #ffffff;
        border: 1px solid;
        border-color: #d1d5db;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        opacity: 1;
        padding: 5px;
        position: relative;
      }

      .jelajah-event-u40budayau41 .button-N61Xxl {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40budayau41 .semua-Fxbx5p {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .button-9GG7N5 {
        --z-index: 1;
        align-items: center;
        background-color: #b31919;
        border-radius: 30px;
        display: flex;
        gap: 10px;
        height: 36px;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
        width: 82px;
      }

      .jelajah-event-u40budayau41 .budaya-O1lQV1 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .button-RIl1UF {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40budayau41 .musik-XiQysS {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .button-FbkxkT {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40budayau41 .seni-js9AMv {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .frame-event-tuzc6y {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: flex;
        gap: 80px;
        left: 89px;
        opacity: 1;
        position: absolute;
        top: 416px;
        width: 1264px;
      }

      .jelajah-event-u40budayau41 .group-event-ZQj5rd {
        --z-index: 0;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        height: 360px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 368px;
      }

      .jelajah-event-u40budayau41 .container-6HBprP {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .image-iJXLko {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 212px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .container-MeubjC {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .margin-SRg4Jx {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40budayau41 .container-1bnNkN {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .overlay-VF83bb {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40budayau41 .musik-rbbqW3 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .link-VF83bb {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .lihat-detail-3zJcI6 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .container-SRg4Jx {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40budayau41 .container-gIn1ox {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .konser-musik-indie-oJsIyX {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40budayau41 .container-g5mVxD {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .jumat-14-juni-2024-bandung-MYZzWk {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40budayau41 .group-event-ClCxXZ {
        --z-index: 1;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        height: 360px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 368px;
      }

      .jelajah-event-u40budayau41 .container-UWpGW2 {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .image-wZJTIZ {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 212px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .container-RcUxxa {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .margin-HbMBN9 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40budayau41 .container-LIJ3Ng {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .overlay-Iox1J3 {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40budayau41 .musik-ne6wyy {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .link-Iox1J3 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .lihat-detail-mN92du {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .container-HbMBN9 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40budayau41 .container-AdvYEi {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .konser-musik-indie-QH5jde {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40budayau41 .container-TaT5Qx {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .jumat-14-juni-2024-bandung-NsAhyT {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40budayau41 .group-event-u4eP1n {
        --z-index: 2;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        height: 360px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 368px;
      }

      .jelajah-event-u40budayau41 .container-ve44sX {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .image-L6oAi1 {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 212px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .container-tvbMP9 {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .margin-gknqd7 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40budayau41 .container-JY6Ycb {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .overlay-DXnM6d {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40budayau41 .musik-hKDDRr {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .link-DXnM6d {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .lihat-detail-ScnGlO {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .container-gknqd7 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40budayau41 .container-hgqrsa {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .konser-musik-indie-oqnjXv {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40budayau41 .container-oiZBiB {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .jumat-14-juni-2024-bandung-QRp4Eb {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40budayau41 .group-navbar-tuzc6y {
        --z-index: 2;
        background-color: transparent;
        height: 65px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 1440px;
      }

      .jelajah-event-u40budayau41 .navbar-utama-Sd2iYW {
        --z-index: 0;
        background-color: transparent;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .rectangle-1-CEpvzl {
        --z-index: 0;
        background-color: #ffffffcc;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .group-82-CEpvzl {
        --z-index: 1;
        background-color: transparent;
        height: 1px;
        left: 1284px;
        opacity: 1;
        position: absolute;
        top: 16px;
        width: 1px;
      }

      .jelajah-event-u40budayau41 .logo-CEpvzl {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        gap: 8px;
        left: 86px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 14px);
      }

      .jelajah-event-u40budayau41 .container-cefsQo {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40budayau41 .svg-g0o5N4 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40budayau41 .vector-a6SbKW {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .jelajah-event-u40budayau41 .heading-1-cefsQo {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .even-tura-P6utxz {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .frame-2-CEpvzl {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        gap: 21px;
        left: calc(50% - 129px);
        opacity: 1;
        position: absolute;
        top: calc(50% - 10px);
      }

      .jelajah-event-u40budayau41 .frame-93-2du5Ul {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .jelajah-event-u40budayau41 .beranda-sVjxRp {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .frame-94-2du5Ul {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-color: #000000;
        border-left-style: none;
        border-right-style: none;
        border-top-style: none;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .jelajah-event-u40budayau41 .event-lYUACE {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .frame-95-2du5Ul {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .jelajah-event-u40budayau41 .tentang-kami-nh1cl6 {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .profil-Sd2iYW {
        --z-index: 1;
        aspect-ratio: 1;
        background-color: transparent;
        cursor: pointer;
        height: 30.77%;
        left: 92.36%;
        opacity: 1;
        position: absolute;
        top: 33.85%;
        width: 0px;
      }

      .jelajah-event-u40budayau41 .vector-FfOBle {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-1.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: -5%;
        opacity: 1;
        position: absolute;
        top: 57.5%;
        width: 110%;
      }

      .jelajah-event-u40budayau41 .vector-xxzdKy {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-2.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: 26.25%;
        opacity: 1;
        position: absolute;
        top: -5%;
        width: 47.5%;
      }

      .jelajah-event-u40budayau41 .footer-utama-tuzc6y {
        --z-index: 3;
        align-items: flex-start;
        background-color: #f5e7b2;
        display: flex;
        flex-wrap: wrap;
        gap: 0px 209px;
        left: 0px;
        opacity: 1;
        padding: 22px 87px;
        position: absolute;
        top: 876px;
        width: 1440px;
      }

      .jelajah-event-u40budayau41 .frame-logo-Z3xR4w {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 4px;
        opacity: 1;
        position: relative;
        width: 618px;
      }

      .jelajah-event-u40budayau41 .logo-6shg9x {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .container-wMWPLg {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40budayau41 .svg-Wf9oC3 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40budayau41 .vector-gfweEi {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .jelajah-event-u40budayau41 .heading-1-wMWPLg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .even-tura-qxdkx3 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .website-yang-berfung-6shg9x {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40budayau41 .nav-Z3xR4w {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 60px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .container-b1OrHs {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 12px;
        height: 156px;
        min-width: 102.83999633789062px;
        opacity: 1;
        position: relative;
        width: 102.83999633789062px;
      }

      .jelajah-event-u40budayau41 .link-TVoVcd {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .navigasi-QgQI94 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #973131cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .link-i7hCqD {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .beranda-xTQRpQ {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .link-lHL0Py {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .event-wQp7mC {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .link-DnfJsR {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .tentang-lPxg6h {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .container-Hh7C27 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 16px;
        height: 156px;
        opacity: 1;
        position: relative;
        width: 275.3299865722656px;
      }

      .jelajah-event-u40budayau41 .heading-3margin-Ejex1t {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 0px 8px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .heading-3-H9Uiai {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .contact-iwYwCx {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #973131;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40budayau41 .container-Ejex1t {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 12px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .link-fP14VL {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .svg-5Ei1Vk {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .jelajah-event-u40budayau41 .vector-U8dFz2 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-25.svg);
        background-size: 100% 100%;
        height: 91.37%;
        left: 4.63%;
        opacity: 1;
        position: absolute;
        top: 4.16%;
        width: 91.2%;
      }

      .jelajah-event-u40budayau41 .container-5Ei1Vk {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .x1-234-567-890-CeFPzB {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .link-X81PwD {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .svg-q7jzOK {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .jelajah-event-u40budayau41 .vector-E8HFz8 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-26.svg);
        background-size: 100% 100%;
        height: 75%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 12.5%;
        width: 91.67%;
      }

      .jelajah-event-u40budayau41 .vector-r22zY7 {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-27.svg);
        background-size: 100% 100%;
        height: 33.32%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 25%;
        width: 91.67%;
      }

      .jelajah-event-u40budayau41 .container-q7jzOK {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        margin-right: -0.67px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40budayau41 .contactislandeventscom-5oHJjz {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .frame-bawah-Z3xR4w {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .jelajah-event-u40budayau41 .horizontal-border-DwXFyv {
        --z-index: 0;
        background-color: transparent;
        border-bottom-style: none;
        border-color: #97313133;
        border-left-style: none;
        border-right-style: none;
        border-top-style: solid;
        border-top-width: 1px;
        height: 57px;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .jelajah-event-u40budayau41 .container-6UNnxL {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/container.svg);
        background-size: 100% 100%;
        display: inline-flex;
        gap: 24px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 6px);
      }

      .jelajah-event-u40budayau41 .container-enQ1rg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: 983px;
        opacity: 1;
        position: absolute;
        top: calc(50% + 8px);
      }

      .jelajah-event-u40budayau41
        .x2024-island-events-all-rights-reserved-M7zUcX {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #00000099;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40budayau41 .hero-section-tuzc6y {
        --z-index: 4;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/hero-section.png);
        background-position: 50% 50%;
        background-size: cover;
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        left: 87px;
        opacity: 1;
        overflow: hidden;
        padding: 20px 0px;
        position: absolute;
        top: 96px;
        width: 1266px;
      }

      .jelajah-event-u40budayau41 .container-wKDh9e {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 48px;
        height: 132px;
        max-width: 1536px;
        opacity: 1;
        padding: 0px 32px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .container-iv3BYm {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 16px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .heading-2-vGHM30 {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40budayau41 .jelajahi-event-nusantara-FcvfKb {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 60px;
        font-style: normal;
        font-weight: 800;
        justify-content: center;
        letter-spacing: -1.5px;
        line-height: 60px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
      }

      .jelajah-event-u40budayau41 .container-vGHM30 {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        max-width: 672px;
        opacity: 1;
        position: relative;
        width: 672px;
      }

      .jelajah-event-u40budayau41 .temukan-berbagai-aca-LrR0Ll {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        width: fit-content;
      }
      /* screen - jelajah-event-u40musiku41 */

      .jelajah-event-u40musiku41 {
        align-items: flex-start;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        height: 1133px;
        left: 0px;
        opacity: 1;
        overflow-x: hidden;
        position: relative;
        top: 0px;
      }

      .jelajah-event-u40musiku41 .container-C61RwL {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 1133px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .container-tuzc6y {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: flex;
        justify-content: space-between;
        left: 88px;
        opacity: 1;
        position: absolute;
        top: 325px;
        width: 1265px;
      }

      .jelajah-event-u40musiku41 .container-0O4qGf {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        max-width: 512px;
        opacity: 1;
        position: relative;
        width: 512px;
        z-index: 1;
      }

      .jelajah-event-u40musiku41 .input-HwucOk {
        --z-index: 0;
        align-self: stretch;
        background-color: #ffffff;
        border: 1px solid;
        border-color: #d1d5db;
        border-radius: 9999px;
        height: 50px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .container-tx4o88 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        left: 49px;
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 15px;
        width: calc(100% - 81px);
      }

      .jelajah-event-u40musiku41 .cari-event-gk9fov {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .container-4GP36P {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: flex;
        left: 49px;
        opacity: 1;
        position: absolute;
        top: 13px;
        width: calc(100% - 66px);
      }

      .jelajah-event-u40musiku41 .container-xa8gsi {
        --z-index: 0;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        height: 24px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .margin-xa8gsi {
        --z-index: 1;
        background-color: transparent;
        height: 11px;
        opacity: 1;
        position: relative;
        width: 15px;
      }

      .jelajah-event-u40musiku41 .container-HwucOk {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        height: 100%;
        left: 0px;
        opacity: 1;
        padding: 0px 0px 0px 16px;
        position: absolute;
        top: 0px;
      }

      .jelajah-event-u40musiku41 .container-wyixDA {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .icon-H6K5wj {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 24.020000457763672px;
      }

      .jelajah-event-u40musiku41 .vector-bvrxXo {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-23.svg);
        background-size: 100% 100%;
        height: 62.5%;
        left: 13.57%;
        opacity: 1;
        position: absolute;
        top: 18.75%;
        width: 72.86%;
      }

      .jelajah-event-u40musiku41 .container-JDzFfr {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 46px;
        opacity: 1;
        position: relative;
        width: 304px;
        z-index: 0;
      }

      .jelajah-event-u40musiku41 .background-border-Tp120e {
        --z-index: 0;
        align-items: center;
        background-color: #ffffff;
        border: 1px solid;
        border-color: #d1d5db;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        opacity: 1;
        padding: 5px;
        position: relative;
      }

      .jelajah-event-u40musiku41 .button-6HRP9x {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40musiku41 .semua-n0xcSu {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .button-qKgOq2 {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        border-radius: 30px;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40musiku41 .budaya-oMakLr {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .button-prkIex {
        --z-index: 2;
        align-items: center;
        background-color: #b31919;
        border-radius: 30px;
        display: flex;
        gap: 10px;
        height: 36px;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
        width: 72px;
      }

      .jelajah-event-u40musiku41 .musik-3r5CUf {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .button-TsOwUt {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        border-radius: 9999px;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40musiku41 .seni-2a4uZB {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .frame-event-tuzc6y {
        --z-index: 1;
        background-color: transparent;
        height: 360px;
        left: 89px;
        opacity: 1;
        position: absolute;
        top: 416px;
        width: 1267px;
      }

      .jelajah-event-u40musiku41 .group-event-ZQj5rd {
        --z-index: 0;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        height: 360px;
        left: 0px;
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 0px;
        width: 369px;
      }

      .jelajah-event-u40musiku41 .container-6HBprP {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .image-iJXLko {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 212px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .container-MeubjC {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .margin-SRg4Jx {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40musiku41 .container-1bnNkN {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .overlay-VF83bb {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40musiku41 .musik-rbbqW3 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .link-VF83bb {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .lihat-detail-3zJcI6 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .container-SRg4Jx {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40musiku41 .container-gIn1ox {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .konser-musik-indie-oJsIyX {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40musiku41 .container-g5mVxD {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .jumat-14-juni-2024-bandung-MYZzWk {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40musiku41 .group-event-ClCxXZ {
        --z-index: 1;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        height: 360px;
        left: calc(50% - 184px);
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 0px;
        width: 367px;
      }

      .jelajah-event-u40musiku41 .container-UWpGW2 {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .image-wZJTIZ {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 212px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .container-RcUxxa {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .margin-HbMBN9 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40musiku41 .container-LIJ3Ng {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .overlay-Iox1J3 {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40musiku41 .musik-ne6wyy {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .link-Iox1J3 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .lihat-detail-mN92du {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .container-HbMBN9 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40musiku41 .container-AdvYEi {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .konser-musik-indie-QH5jde {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40musiku41 .container-TaT5Qx {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .jumat-14-juni-2024-bandung-NsAhyT {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40musiku41 .group-event-u4eP1n {
        --z-index: 2;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        height: 360px;
        left: 896px;
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 0px;
        width: 369px;
      }

      .jelajah-event-u40musiku41 .container-ve44sX {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .image-L6oAi1 {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 212px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .container-tvbMP9 {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .margin-gknqd7 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40musiku41 .container-JY6Ycb {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .overlay-DXnM6d {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40musiku41 .musik-hKDDRr {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .link-DXnM6d {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .lihat-detail-ScnGlO {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .container-gknqd7 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40musiku41 .container-hgqrsa {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .konser-musik-indie-oqnjXv {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40musiku41 .container-oiZBiB {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .jumat-14-juni-2024-bandung-QRp4Eb {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40musiku41 .group-navbar-tuzc6y {
        --z-index: 2;
        background-color: transparent;
        height: 65px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 1440px;
      }

      .jelajah-event-u40musiku41 .navbar-utama-Sd2iYW {
        --z-index: 0;
        background-color: transparent;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .rectangle-1-CEpvzl {
        --z-index: 0;
        background-color: #ffffffcc;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .group-82-CEpvzl {
        --z-index: 1;
        background-color: transparent;
        height: 1px;
        left: 1284px;
        opacity: 1;
        position: absolute;
        top: 16px;
        width: 1px;
      }

      .jelajah-event-u40musiku41 .logo-CEpvzl {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        gap: 8px;
        left: 86px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 14px);
      }

      .jelajah-event-u40musiku41 .container-cefsQo {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40musiku41 .svg-g0o5N4 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40musiku41 .vector-a6SbKW {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .jelajah-event-u40musiku41 .heading-1-cefsQo {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .even-tura-P6utxz {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .frame-2-CEpvzl {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        gap: 21px;
        left: calc(50% - 129px);
        opacity: 1;
        position: absolute;
        top: calc(50% - 10px);
      }

      .jelajah-event-u40musiku41 .frame-93-2du5Ul {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .jelajah-event-u40musiku41 .beranda-sVjxRp {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .frame-94-2du5Ul {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-color: #000000;
        border-left-style: none;
        border-right-style: none;
        border-top-style: none;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .jelajah-event-u40musiku41 .event-lYUACE {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .frame-95-2du5Ul {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .jelajah-event-u40musiku41 .tentang-kami-nh1cl6 {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .profil-Sd2iYW {
        --z-index: 1;
        aspect-ratio: 1;
        background-color: transparent;
        cursor: pointer;
        height: 30.77%;
        left: 92.36%;
        opacity: 1;
        position: absolute;
        top: 33.85%;
        width: 0px;
      }

      .jelajah-event-u40musiku41 .vector-FfOBle {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-1.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: -5%;
        opacity: 1;
        position: absolute;
        top: 57.5%;
        width: 110%;
      }

      .jelajah-event-u40musiku41 .vector-xxzdKy {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-2.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: 26.25%;
        opacity: 1;
        position: absolute;
        top: -5%;
        width: 47.5%;
      }

      .jelajah-event-u40musiku41 .footer-utama-tuzc6y {
        --z-index: 3;
        align-items: flex-start;
        background-color: #f5e7b2;
        display: flex;
        flex-wrap: wrap;
        gap: 0px 209px;
        left: 0px;
        opacity: 1;
        padding: 22px 87px;
        position: absolute;
        top: 876px;
        width: 1440px;
      }

      .jelajah-event-u40musiku41 .frame-logo-Z3xR4w {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 4px;
        opacity: 1;
        position: relative;
        width: 618px;
      }

      .jelajah-event-u40musiku41 .logo-6shg9x {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .container-wMWPLg {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40musiku41 .svg-Wf9oC3 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40musiku41 .vector-gfweEi {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .jelajah-event-u40musiku41 .heading-1-wMWPLg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .even-tura-qxdkx3 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .website-yang-berfung-6shg9x {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40musiku41 .nav-Z3xR4w {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 60px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .container-b1OrHs {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 12px;
        height: 156px;
        min-width: 102.83999633789062px;
        opacity: 1;
        position: relative;
        width: 102.83999633789062px;
      }

      .jelajah-event-u40musiku41 .link-TVoVcd {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .navigasi-QgQI94 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #973131cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .link-i7hCqD {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .beranda-xTQRpQ {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .link-lHL0Py {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .event-wQp7mC {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .link-DnfJsR {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .tentang-lPxg6h {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .container-Hh7C27 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 16px;
        height: 156px;
        opacity: 1;
        position: relative;
        width: 275.3299865722656px;
      }

      .jelajah-event-u40musiku41 .heading-3margin-Ejex1t {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 0px 8px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .heading-3-H9Uiai {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .contact-iwYwCx {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #973131;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40musiku41 .container-Ejex1t {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 12px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .link-fP14VL {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .svg-5Ei1Vk {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .jelajah-event-u40musiku41 .vector-U8dFz2 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-32.svg);
        background-size: 100% 100%;
        height: 91.37%;
        left: 4.63%;
        opacity: 1;
        position: absolute;
        top: 4.16%;
        width: 91.2%;
      }

      .jelajah-event-u40musiku41 .container-5Ei1Vk {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .x1-234-567-890-CeFPzB {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .link-X81PwD {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .svg-q7jzOK {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .jelajah-event-u40musiku41 .vector-E8HFz8 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-33.svg);
        background-size: 100% 100%;
        height: 75%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 12.5%;
        width: 91.67%;
      }

      .jelajah-event-u40musiku41 .vector-r22zY7 {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-13.svg);
        background-size: 100% 100%;
        height: 33.32%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 25%;
        width: 91.67%;
      }

      .jelajah-event-u40musiku41 .container-q7jzOK {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        margin-right: -0.67px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40musiku41 .contactislandeventscom-5oHJjz {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .frame-bawah-Z3xR4w {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .jelajah-event-u40musiku41 .horizontal-border-DwXFyv {
        --z-index: 0;
        background-color: transparent;
        border-bottom-style: none;
        border-color: #97313133;
        border-left-style: none;
        border-right-style: none;
        border-top-style: solid;
        border-top-width: 1px;
        height: 57px;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .jelajah-event-u40musiku41 .container-6UNnxL {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/container.svg);
        background-size: 100% 100%;
        display: inline-flex;
        gap: 24px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 6px);
      }

      .jelajah-event-u40musiku41 .container-enQ1rg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: 983px;
        opacity: 1;
        position: absolute;
        top: calc(50% + 8px);
      }

      .jelajah-event-u40musiku41
        .x2024-island-events-all-rights-reserved-M7zUcX {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #00000099;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40musiku41 .hero-section-tuzc6y {
        --z-index: 4;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/hero-section.png);
        background-position: 50% 50%;
        background-size: cover;
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        left: 87px;
        opacity: 1;
        overflow: hidden;
        padding: 20px 0px;
        position: absolute;
        top: 96px;
        width: 1267px;
      }

      .jelajah-event-u40musiku41 .container-wKDh9e {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 48px;
        height: 132px;
        max-width: 1536px;
        opacity: 1;
        padding: 0px 32px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .container-iv3BYm {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 16px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .heading-2-vGHM30 {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40musiku41 .jelajahi-event-nusantara-FcvfKb {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 60px;
        font-style: normal;
        font-weight: 800;
        justify-content: center;
        letter-spacing: -1.5px;
        line-height: 60px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
      }

      .jelajah-event-u40musiku41 .container-vGHM30 {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        max-width: 672px;
        opacity: 1;
        position: relative;
        width: 672px;
      }

      .jelajah-event-u40musiku41 .temukan-berbagai-aca-LrR0Ll {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        width: fit-content;
      }
      /* screen - jelajah-event-u40seniu41 */

      .jelajah-event-u40seniu41 {
        align-items: flex-start;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        height: 1133px;
        left: 0px;
        opacity: 1;
        overflow-x: hidden;
        position: relative;
        top: 0px;
      }

      .jelajah-event-u40seniu41 .container-C61RwL {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 1133px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .container-tuzc6y {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: flex;
        justify-content: space-between;
        left: 88px;
        opacity: 1;
        position: absolute;
        top: 325px;
        width: 1265px;
      }

      .jelajah-event-u40seniu41 .container-0O4qGf {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 50px;
        max-width: 512px;
        opacity: 1;
        position: relative;
        width: 512px;
      }

      .jelajah-event-u40seniu41 .input-HwucOk {
        --z-index: 0;
        align-self: stretch;
        background-color: #ffffff;
        border: 1px solid;
        border-color: #d1d5db;
        border-radius: 9999px;
        height: 50px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .container-tx4o88 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        left: 49px;
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 15px;
        width: calc(100% - 81px);
      }

      .jelajah-event-u40seniu41 .cari-event-gk9fov {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .container-4GP36P {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: flex;
        left: 49px;
        opacity: 1;
        position: absolute;
        top: 13px;
        width: calc(100% - 66px);
      }

      .jelajah-event-u40seniu41 .container-xa8gsi {
        --z-index: 0;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        height: 24px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .margin-xa8gsi {
        --z-index: 1;
        background-color: transparent;
        height: 11px;
        opacity: 1;
        position: relative;
        width: 15px;
      }

      .jelajah-event-u40seniu41 .container-HwucOk {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        height: 100%;
        left: 0px;
        opacity: 1;
        padding: 0px 0px 0px 16px;
        position: absolute;
        top: 0px;
      }

      .jelajah-event-u40seniu41 .container-wyixDA {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .icon-H6K5wj {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 24.020000457763672px;
      }

      .jelajah-event-u40seniu41 .vector-bvrxXo {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-23.svg);
        background-size: 100% 100%;
        height: 62.5%;
        left: 13.57%;
        opacity: 1;
        position: absolute;
        top: 18.75%;
        width: 72.86%;
      }

      .jelajah-event-u40seniu41 .container-JDzFfr {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .background-border-Tp120e {
        --z-index: 0;
        align-items: center;
        background-color: #ffffff;
        border: 1px solid;
        border-color: #d1d5db;
        border-radius: 9999px;
        display: flex;
        flex: 0 0 auto;
        opacity: 1;
        padding: 5px;
        position: relative;
        width: 302px;
      }

      .jelajah-event-u40seniu41 .button-6HRP9x {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        border-radius: 9999px;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40seniu41 .semua-n0xcSu {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .button-qKgOq2 {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        border-radius: 30px;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
      }

      .jelajah-event-u40seniu41 .budaya-oMakLr {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .button-prkIex {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        border-radius: 30px;
        cursor: pointer;
        display: flex;
        gap: 10px;
        height: 36px;
        justify-content: center;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
        width: 72px;
      }

      .jelajah-event-u40seniu41 .musik-3r5CUf {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #4b5563;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        height: 12px;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: 40px;
      }

      .jelajah-event-u40seniu41 .button-TsOwUt {
        --z-index: 3;
        align-items: center;
        background-color: #b31919;
        border-radius: 30px;
        display: flex;
        gap: 10px;
        height: 36px;
        justify-content: center;
        margin-right: -2px;
        opacity: 1;
        padding: 8px 16px;
        position: relative;
        width: 62px;
      }

      .jelajah-event-u40seniu41 .seni-2a4uZB {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .footer-utama-tuzc6y {
        --z-index: 1;
        align-items: flex-start;
        background-color: #f5e7b2;
        display: flex;
        flex-wrap: wrap;
        gap: 0px 209px;
        left: 0px;
        opacity: 1;
        padding: 22px 87px;
        position: absolute;
        top: 876px;
        width: 1440px;
      }

      .jelajah-event-u40seniu41 .frame-logo-Z3xR4w {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 4px;
        opacity: 1;
        position: relative;
        width: 618px;
      }

      .jelajah-event-u40seniu41 .logo-6shg9x {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .container-wMWPLg {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40seniu41 .svg-Wf9oC3 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40seniu41 .vector-gfweEi {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .jelajah-event-u40seniu41 .heading-1-wMWPLg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .even-tura-qxdkx3 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .website-yang-berfung-6shg9x {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40seniu41 .nav-Z3xR4w {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 60px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .container-b1OrHs {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 12px;
        height: 156px;
        min-width: 102.83999633789062px;
        opacity: 1;
        position: relative;
        width: 102.83999633789062px;
      }

      .jelajah-event-u40seniu41 .link-TVoVcd {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .navigasi-QgQI94 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #973131cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .link-i7hCqD {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .beranda-xTQRpQ {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .link-lHL0Py {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .event-wQp7mC {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .link-DnfJsR {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .tentang-lPxg6h {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .container-Hh7C27 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 16px;
        height: 156px;
        opacity: 1;
        position: relative;
        width: 275.3299865722656px;
      }

      .jelajah-event-u40seniu41 .heading-3margin-Ejex1t {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 0px 8px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .heading-3-H9Uiai {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .contact-iwYwCx {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #973131;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40seniu41 .container-Ejex1t {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 12px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .link-fP14VL {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .svg-5Ei1Vk {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .jelajah-event-u40seniu41 .vector-U8dFz2 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-11.svg);
        background-size: 100% 100%;
        height: 91.37%;
        left: 4.63%;
        opacity: 1;
        position: absolute;
        top: 4.16%;
        width: 91.2%;
      }

      .jelajah-event-u40seniu41 .container-5Ei1Vk {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .x1-234-567-890-CeFPzB {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .link-X81PwD {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .svg-q7jzOK {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .jelajah-event-u40seniu41 .vector-E8HFz8 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-12.svg);
        background-size: 100% 100%;
        height: 75%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 12.5%;
        width: 91.67%;
      }

      .jelajah-event-u40seniu41 .vector-r22zY7 {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-13.svg);
        background-size: 100% 100%;
        height: 33.32%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 25%;
        width: 91.67%;
      }

      .jelajah-event-u40seniu41 .container-q7jzOK {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        margin-right: -0.67px;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .contactislandeventscom-5oHJjz {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .frame-bawah-Z3xR4w {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .jelajah-event-u40seniu41 .horizontal-border-DwXFyv {
        --z-index: 0;
        background-color: transparent;
        border-bottom-style: none;
        border-color: #97313133;
        border-left-style: none;
        border-right-style: none;
        border-top-style: solid;
        border-top-width: 1px;
        height: 57px;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .jelajah-event-u40seniu41 .container-6UNnxL {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/container.svg);
        background-size: 100% 100%;
        display: inline-flex;
        gap: 24px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 6px);
      }

      .jelajah-event-u40seniu41 .container-enQ1rg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: 983px;
        opacity: 1;
        position: absolute;
        top: calc(50% + 8px);
      }

      .jelajah-event-u40seniu41
        .x2024-island-events-all-rights-reserved-M7zUcX {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #00000099;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .frame-event-tuzc6y {
        --z-index: 2;
        background-color: transparent;
        height: 360px;
        left: 89px;
        opacity: 1;
        position: absolute;
        top: 416px;
        width: 1264px;
      }

      .jelajah-event-u40seniu41 .group-event-ZQj5rd {
        --z-index: 0;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        height: 360px;
        left: 0px;
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 0px;
        width: 368px;
      }

      .jelajah-event-u40seniu41 .container-6HBprP {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .image-iJXLko {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 212px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .container-MeubjC {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .margin-SRg4Jx {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40seniu41 .container-1bnNkN {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .overlay-VF83bb {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40seniu41 .musik-rbbqW3 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .link-VF83bb {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .lihat-detail-3zJcI6 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .container-SRg4Jx {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40seniu41 .container-gIn1ox {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .konser-musik-indie-oJsIyX {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40seniu41 .container-g5mVxD {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .jumat-14-juni-2024-bandung-MYZzWk {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40seniu41 .group-event-ClCxXZ {
        --z-index: 1;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        height: 360px;
        left: calc(50% - 186px);
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 0px;
        width: 368px;
      }

      .jelajah-event-u40seniu41 .container-UWpGW2 {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .image-wZJTIZ {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 212px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .container-RcUxxa {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .margin-HbMBN9 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40seniu41 .container-LIJ3Ng {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .overlay-Iox1J3 {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40seniu41 .musik-ne6wyy {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .link-Iox1J3 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .lihat-detail-mN92du {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .container-HbMBN9 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40seniu41 .container-AdvYEi {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .konser-musik-indie-QH5jde {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40seniu41 .container-TaT5Qx {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .jumat-14-juni-2024-bandung-NsAhyT {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40seniu41 .group-event-u4eP1n {
        --z-index: 2;
        align-items: flex-start;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 15px 15px 10px -3px #0000001a;
        display: flex;
        flex-direction: column;
        height: 360px;
        left: 896px;
        opacity: 1;
        overflow: hidden;
        position: absolute;
        top: 0px;
        width: 368px;
      }

      .jelajah-event-u40seniu41 .container-ve44sX {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        height: 212px;
        opacity: 1;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .image-L6oAi1 {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 212px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .container-tvbMP9 {
        --z-index: 1;
        align-self: stretch;
        background-color: transparent;
        flex: 1;
        flex-grow: 1;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .margin-gknqd7 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 24px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 96px;
        width: 321px;
      }

      .jelajah-event-u40seniu41 .container-JY6Ycb {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        justify-content: space-between;
        opacity: 1;
        padding: 0px 0.009999999776482582px 0px 0px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .overlay-DXnM6d {
        --z-index: 0;
        align-items: flex-start;
        background-color: #b319191a;
        border-radius: 9999px;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 10px;
        position: relative;
      }

      .jelajah-event-u40seniu41 .musik-hKDDRr {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 16px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .link-DXnM6d {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .lihat-detail-ScnGlO {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .container-gknqd7 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 8px;
        height: 65px;
        left: calc(50% - 161px);
        opacity: 1;
        position: absolute;
        top: 18px;
        width: 321px;
      }

      .jelajah-event-u40seniu41 .container-hgqrsa {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .konser-musik-indie-oqnjXv {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40seniu41 .container-oiZBiB {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .jumat-14-juni-2024-bandung-QRp4Eb {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #6b7280;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .jelajah-event-u40seniu41 .group-navbar-tuzc6y {
        --z-index: 3;
        background-color: transparent;
        height: 65px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 1440px;
      }

      .jelajah-event-u40seniu41 .navbar-utama-Sd2iYW {
        --z-index: 0;
        background-color: transparent;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .rectangle-1-CEpvzl {
        --z-index: 0;
        background-color: #ffffffcc;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .group-82-CEpvzl {
        --z-index: 1;
        background-color: transparent;
        height: 1px;
        left: 1284px;
        opacity: 1;
        position: absolute;
        top: 16px;
        width: 1px;
      }

      .jelajah-event-u40seniu41 .logo-CEpvzl {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        gap: 8px;
        left: 86px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 14px);
      }

      .jelajah-event-u40seniu41 .container-cefsQo {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40seniu41 .svg-g0o5N4 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .jelajah-event-u40seniu41 .vector-a6SbKW {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .jelajah-event-u40seniu41 .heading-1-cefsQo {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .jelajah-event-u40seniu41 .even-tura-P6utxz {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .frame-2-CEpvzl {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        gap: 21px;
        left: calc(50% - 129px);
        opacity: 1;
        position: absolute;
        top: calc(50% - 10px);
      }

      .jelajah-event-u40seniu41 .frame-93-2du5Ul {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .jelajah-event-u40seniu41 .beranda-sVjxRp {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .frame-94-2du5Ul {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-color: #000000;
        border-left-style: none;
        border-right-style: none;
        border-top-style: none;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .jelajah-event-u40seniu41 .event-lYUACE {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .frame-95-2du5Ul {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .jelajah-event-u40seniu41 .tentang-kami-nh1cl6 {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .jelajah-event-u40seniu41 .profil-Sd2iYW {
        --z-index: 1;
        aspect-ratio: 1;
        background-color: transparent;
        cursor: pointer;
        height: 30.77%;
        left: 92.36%;
        opacity: 1;
        position: absolute;
        top: 33.85%;
        width: 0px;
      }

      .jelajah-event-u40seniu41 .vector-FfOBle {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-1.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: -5%;
        opacity: 1;
        position: absolute;
        top: 57.5%;
        width: 110%;
      }

      .jelajah-event-u40seniu41 .vector-xxzdKy {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-2.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: 26.25%;
        opacity: 1;
        position: absolute;
        top: -5%;
        width: 47.5%;
      }

      .jelajah-event-u40seniu41 .hero-section-tuzc6y {
        --z-index: 4;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/hero-section.png);
        background-position: 50% 50%;
        background-size: cover;
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        left: 87px;
        opacity: 1;
        overflow: hidden;
        padding: 20px 0px;
        position: absolute;
        top: 96px;
        width: 1267px;
      }

      .jelajah-event-u40seniu41 .container-wKDh9e {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 48px;
        height: 132px;
        max-width: 1536px;
        opacity: 1;
        padding: 0px 32px;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .container-iv3BYm {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 16px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .heading-2-vGHM30 {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .jelajah-event-u40seniu41 .jelajahi-event-nusantara-FcvfKb {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 60px;
        font-style: normal;
        font-weight: 800;
        justify-content: center;
        letter-spacing: -1.5px;
        line-height: 60px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
      }

      .jelajah-event-u40seniu41 .container-vGHM30 {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        max-width: 672px;
        opacity: 1;
        position: relative;
        width: 672px;
      }

      .jelajah-event-u40seniu41 .temukan-berbagai-aca-LrR0Ll {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        width: fit-content;
      }
      /* screen - page-event-yang-diikuti */

      .page-event-yang-diikuti {
        align-items: flex-start;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        height: 1184px;
        left: 0px;
        opacity: 1;
        overflow-x: hidden;
        position: relative;
        top: 0px;
      }

      .page-event-yang-diikuti .group-navbar-C61RwL {
        --z-index: 0;
        background-color: transparent;
        height: 65px;
        opacity: 1;
        position: relative;
        width: 1440px;
      }

      .page-event-yang-diikuti .navbar-utama-DP1VkW {
        --z-index: 0;
        background-color: transparent;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .page-event-yang-diikuti .rectangle-1-a2t32t {
        --z-index: 0;
        background-color: #ffffffcc;
        height: 100%;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 0px;
        width: 100%;
      }

      .page-event-yang-diikuti .group-82-a2t32t {
        --z-index: 1;
        background-color: transparent;
        height: 1px;
        left: 1284px;
        opacity: 1;
        position: absolute;
        top: 16px;
        width: 1px;
      }

      .page-event-yang-diikuti .logo-a2t32t {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        gap: 8px;
        left: 86px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 14px);
      }

      .page-event-yang-diikuti .container-srsPWg {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .page-event-yang-diikuti .svg-wu39F6 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .page-event-yang-diikuti .vector-pIECLt {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .page-event-yang-diikuti .heading-1-srsPWg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-diikuti .even-tura-dVRD8C {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .frame-2-a2t32t {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        gap: 21px;
        left: calc(50% - 129px);
        opacity: 1;
        position: absolute;
        top: calc(50% - 10px);
      }

      .page-event-yang-diikuti .frame-93-AWqVf7 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .page-event-yang-diikuti .beranda-IV52nv {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .frame-94-AWqVf7 {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .page-event-yang-diikuti .event-VuxQoF {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .frame-95-AWqVf7 {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        overflow: hidden;
        position: relative;
      }

      .page-event-yang-diikuti .tentang-kami-03dhao {
        --z-index: 0;
        background-color: transparent;
        color: #000000;
        cursor: pointer;
        font-family: "Montserrat", Helvetica;
        font-size: 15px;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 0px;
        line-height: normal;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .profil-DP1VkW {
        --z-index: 1;
        aspect-ratio: 1;
        background-color: transparent;
        cursor: pointer;
        height: 30.77%;
        left: 92.36%;
        opacity: 1;
        position: absolute;
        top: 33.85%;
        width: 0px;
      }

      .page-event-yang-diikuti .vector-2e1dgV {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-1.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: -5%;
        opacity: 1;
        position: absolute;
        top: 57.5%;
        width: 110%;
      }

      .page-event-yang-diikuti .vector-gjYGxX {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-2.svg);
        background-size: 100% 100%;
        height: 47.5%;
        left: 26.25%;
        opacity: 1;
        position: absolute;
        top: -5%;
        width: 47.5%;
      }

      .page-event-yang-diikuti .container-C61RwL {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 1119px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .mainmargin-tuzc6y {
        --z-index: 0;
        align-self: stretch;
        background-color: transparent;
        height: 862px;
        opacity: 1;
        position: relative;
        width: 100%;
        z-index: 1;
      }

      .page-event-yang-diikuti .main-xXn3Dd {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        gap: 20px;
        height: 866px;
        left: 0px;
        opacity: 1;
        padding: 44px 0px 86px 89px;
        position: relative;
        top: 0px;
        width: 100%;
      }

      .page-event-yang-diikuti .background-shadow-M7OuBP {
        --z-index: 0;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0px 5px 2px #0000000d;
        height: 324px;
        opacity: 1;
        position: relative;
        width: 272px;
      }

      .page-event-yang-diikuti .container-TkGOxU {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: calc(50% - 100px);
        opacity: 1;
        position: absolute;
        top: 176px;
      }

      .page-event-yang-diikuti .heading-1-PGizWL {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .fadiyah-FIVWdu {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #1c1917;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 24px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 32px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .container-PGizWL {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .penggemar-seni-budaya-x27PP2 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #57534e;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .container-g9xb1E {
        --z-index: 2;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 0px 0px;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .pengguna-s7q6ZA {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #78716c;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .button-TkGOxU {
        --z-index: 1;
        align-items: center;
        background-color: #b31919;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        left: 24px;
        opacity: 1;
        padding: 10px 16px;
        position: absolute;
        top: 280px;
        width: calc(100% - 48px);
      }

      .page-event-yang-diikuti .edit-profil-iIkd5c {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #ffffff;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .container-CPZfq6 {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/container-12.svg);
        background-size: 100% 100%;
        display: inline-flex;
        flex-direction: column;
        left: calc(50% - 64px);
        opacity: 1;
        position: absolute;
        top: 24px;
      }

      .page-event-yang-diikuti .container-M7OuBP {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 30px;
        height: 700px;
        opacity: 1;
        position: relative;
        width: 971px;
      }

      .page-event-yang-diikuti .container-8ckstU {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 30px;
        height: 615px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: 90px;
        width: 100%;
      }

      .page-event-yang-diikuti .heading-3-jjp2NI {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .event-favorit-4FsIms {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #1c1917;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 30px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: -0.45px;
        line-height: 22.5px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-diikuti .container-jjp2NI {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 38px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .event-favorit-dw7Hxw {
        --z-index: 0;
        align-items: center;
        background-color: #f8f6f6;
        border-radius: 8px;
        box-shadow: 0px 1px 2px #0000000d;
        display: flex;
        flex: 0 0 auto;
        gap: 24px;
        opacity: 1;
        padding: 16px;
        position: relative;
        width: 971px;
      }

      .page-event-yang-diikuti .image-nWJ76h {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/image-10@2x.png);
        background-size: 100% 100%;
        height: 128px;
        object-fit: cover;
        opacity: 1;
        position: relative;
        width: 256px;
      }

      .page-event-yang-diikuti .container-nWJ76h {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 128px;
        justify-content: space-between;
        opacity: 1;
        position: relative;
        width: 488px;
      }

      .page-event-yang-diikuti .container-MTKkaG {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .container-CKpVd7 {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .budaya-e6xmaD {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-diikuti .heading-4-CKpVd7 {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .tari-kecak-bpkw47 {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #1c1917;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-diikuti .container-xrR8iT {
        --z-index: 2;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 0px 0px;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .ikuti-keindahan-tari-kAO2LG {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #57534e;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-diikuti .buttonmargin-MTKkaG {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 16px 0px 0px;
        position: relative;
      }

      .page-event-yang-diikuti .button-9qykPm {
        --z-index: 0;
        align-items: center;
        background-color: #f5e7b2;
        border-radius: 4px;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 6px 12px;
        position: relative;
      }

      .page-event-yang-diikuti .lihat-detail-tnMm2z {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti
        .material-symbolsbookmark-outline-rounded-nWJ76h {
        --z-index: 2;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/material-symbols-bookmark-outline-rounded.svg);
        background-size: 100% 100%;
        height: 24px;
        left: 245px;
        opacity: 1;
        position: absolute;
        top: 19px;
        width: 24px;
      }

      .page-event-yang-diikuti .event-favorit-qrHxGv {
        --z-index: 1;
        align-items: center;
        background-color: #f8f6f6;
        border-radius: 8px;
        box-shadow: 0px 1px 2px #0000000d;
        display: flex;
        flex: 0 0 auto;
        gap: 24px;
        opacity: 1;
        padding: 16px;
        position: relative;
        width: 971px;
      }

      .page-event-yang-diikuti .image-JY7apX {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/image-11@2x.png);
        background-size: 100% 100%;
        height: 128px;
        object-fit: cover;
        opacity: 1;
        position: relative;
        width: 256px;
      }

      .page-event-yang-diikuti .container-JY7apX {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 128px;
        justify-content: space-between;
        opacity: 1;
        position: relative;
        width: 488px;
      }

      .page-event-yang-diikuti .container-WxUfU1 {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .container-8uxMr0 {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .budaya-T7i6BQ {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-diikuti .heading-4-8uxMr0 {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .tari-kecak-kGDdFM {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #1c1917;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-diikuti .container-3JjWGk {
        --z-index: 2;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 0px 0px;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .ikuti-keindahan-tari-ux2xJN {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #57534e;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-diikuti .buttonmargin-WxUfU1 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        margin-top: -12px;
        opacity: 1;
        padding: 16px 0px 0px;
        position: relative;
      }

      .page-event-yang-diikuti .button-MHBLUq {
        --z-index: 0;
        align-items: center;
        background-color: #f5e7b2;
        border-radius: 4px;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 6px 12px;
        position: relative;
      }

      .page-event-yang-diikuti .lihat-detail-LzBNGs {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti
        .material-symbolsbookmark-outline-rounded-JY7apX {
        --z-index: 2;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/material-symbols-bookmark-outline-rounded.svg);
        background-size: 100% 100%;
        height: 24px;
        left: 245px;
        opacity: 1;
        position: absolute;
        top: 19px;
        width: 24px;
      }

      .page-event-yang-diikuti .event-favorit-R3xrxH {
        --z-index: 2;
        align-items: center;
        background-color: #f8f6f6;
        border-radius: 8px;
        box-shadow: 0px 1px 2px #0000000d;
        display: flex;
        flex: 0 0 auto;
        gap: 24px;
        opacity: 1;
        padding: 16px;
        position: relative;
        width: 971px;
      }

      .page-event-yang-diikuti .image-Cr1Cxa {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/image-12@2x.png);
        background-size: 100% 100%;
        height: 128px;
        object-fit: cover;
        opacity: 1;
        position: relative;
        width: 256px;
      }

      .page-event-yang-diikuti .container-Cr1Cxa {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 128px;
        justify-content: space-between;
        opacity: 1;
        position: relative;
        width: 488px;
      }

      .page-event-yang-diikuti .container-PmtSnr {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .container-pDScjT {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .budaya-vcxqq3 {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-diikuti .heading-4-pDScjT {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .tari-kecak-DIvDwx {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #1c1917;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-diikuti .container-JBhdUz {
        --z-index: 2;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 4px 0px 0px;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .ikuti-keindahan-tari-LxYGaI {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #57534e;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-diikuti .buttonmargin-PmtSnr {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        margin-top: -12px;
        opacity: 1;
        padding: 16px 0px 0px;
        position: relative;
      }

      .page-event-yang-diikuti .button-DIkwuN {
        --z-index: 0;
        align-items: center;
        background-color: #f5e7b2;
        border-radius: 4px;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 6px 12px;
        position: relative;
      }

      .page-event-yang-diikuti .lihat-detail-75Z1vx {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: center;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti
        .material-symbolsbookmark-outline-rounded-Cr1Cxa {
        --z-index: 2;
        aspect-ratio: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/material-symbols-bookmark-outline-rounded.svg);
        background-size: 100% 100%;
        height: 24px;
        left: 245px;
        opacity: 1;
        position: absolute;
        top: 19px;
        width: 24px;
      }

      .page-event-yang-diikuti .horizontal-border-8ckstU {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-color: #e7e5e4;
        border-left-style: none;
        border-right-style: none;
        border-top-style: none;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .nav-tabs-N4eFvZ {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        opacity: 1;
        padding: 0px 16px;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .link-ktwL6R {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        border-bottom-style: solid;
        border-bottom-width: 2px;
        border-color: #b31919;
        border-left-style: none;
        border-right-style: none;
        border-top-style: none;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 16px 4px 18px;
        position: relative;
      }

      .page-event-yang-diikuti .event-favorit-fptWRS {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #b31919;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -2px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .linkmargin-ktwL6R {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 0px 0px 0px 32px;
        position: relative;
      }

      .page-event-yang-diikuti .link-CGKJSf {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        height: 54px;
        opacity: 1;
        padding: 16px 4px 18px;
        position: relative;
      }

      .page-event-yang-diikuti .event-yang-disukai-nfnWeb {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #78716c;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .linkmargin-9Kwlq7 {
        --z-index: 2;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        cursor: pointer;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        justify-content: center;
        opacity: 1;
        padding: 0px 0px 0px 32px;
        position: relative;
      }

      .page-event-yang-diikuti .link-XcrBB4 {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        height: 54px;
        opacity: 1;
        padding: 16px 4px 18px;
        position: relative;
      }

      .page-event-yang-diikuti .pengaturan-akun-Uw1yFZ {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #78716c;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .footer-utama-tuzc6y {
        --z-index: 1;
        align-items: flex-start;
        background-color: #f5e7b2;
        display: flex;
        flex: 0 0 auto;
        flex-wrap: wrap;
        gap: 0px 209px;
        opacity: 1;
        padding: 22px 87px;
        position: relative;
        width: 1440px;
        z-index: 0;
      }

      .page-event-yang-diikuti .frame-logo-Z3xR4w {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 4px;
        opacity: 1;
        position: relative;
        width: 618px;
      }

      .page-event-yang-diikuti .logo-6shg9x {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-diikuti .container-wMWPLg {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .page-event-yang-diikuti .svg-Wf9oC3 {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 28px;
      }

      .page-event-yang-diikuti .vector-gfweEi {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector.svg);
        background-size: 100% 100%;
        height: 86.76%;
        left: 6.62%;
        opacity: 1;
        position: absolute;
        top: 6.62%;
        width: 86.76%;
      }

      .page-event-yang-diikuti .heading-1-wMWPLg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-diikuti .even-tura-qxdkx3 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #111827;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .website-yang-berfung-6shg9x {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 10px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: normal;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-diikuti .nav-Z3xR4w {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 60px;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-diikuti .container-b1OrHs {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 12px;
        height: 156px;
        min-width: 102.83999633789062px;
        opacity: 1;
        position: relative;
        width: 102.83999633789062px;
      }

      .page-event-yang-diikuti .link-TVoVcd {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-diikuti .navigasi-QgQI94 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #973131cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .link-i7hCqD {
        --z-index: 1;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-diikuti .beranda-xTQRpQ {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .link-lHL0Py {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-diikuti .event-wQp7mC {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .link-DnfJsR {
        --z-index: 3;
        align-items: center;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        gap: 10px;
        justify-content: center;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-diikuti .tentang-lPxg6h {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .container-Hh7C27 {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        gap: 16px;
        height: 156px;
        opacity: 1;
        position: relative;
        width: 275.3299865722656px;
      }

      .page-event-yang-diikuti .heading-3margin-Ejex1t {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        padding: 0px 0px 8px;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .heading-3-H9Uiai {
        --z-index: 0;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .contact-iwYwCx {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        color: #973131;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
      }

      .page-event-yang-diikuti .container-Ejex1t {
        --z-index: 1;
        align-items: flex-start;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        flex-direction: column;
        gap: 12px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .link-fP14VL {
        --z-index: 0;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .svg-5Ei1Vk {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .page-event-yang-diikuti .vector-U8dFz2 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-11.svg);
        background-size: 100% 100%;
        height: 91.37%;
        left: 4.63%;
        opacity: 1;
        position: absolute;
        top: 4.16%;
        width: 91.2%;
      }

      .page-event-yang-diikuti .container-5Ei1Vk {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-diikuti .x1-234-567-890-CeFPzB {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .link-X81PwD {
        --z-index: 1;
        align-items: center;
        align-self: stretch;
        background-color: transparent;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        opacity: 1;
        position: relative;
        width: 100%;
      }

      .page-event-yang-diikuti .svg-q7jzOK {
        --z-index: 0;
        background-color: transparent;
        height: 20px;
        opacity: 1;
        position: relative;
        width: 20px;
      }

      .page-event-yang-diikuti .vector-E8HFz8 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-12.svg);
        background-size: 100% 100%;
        height: 75%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 12.5%;
        width: 91.67%;
      }

      .page-event-yang-diikuti .vector-r22zY7 {
        --z-index: 1;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-13.svg);
        background-size: 100% 100%;
        height: 33.32%;
        left: 4.17%;
        opacity: 1;
        position: absolute;
        top: 25%;
        width: 91.67%;
      }

      .page-event-yang-diikuti .container-q7jzOK {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        margin-right: -0.67px;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-diikuti .contactislandeventscom-5oHJjz {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #000000cc;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 18px;
        font-style: normal;
        font-weight: 500;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 28px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .frame-bawah-Z3xR4w {
        --z-index: 2;
        align-items: flex-start;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .page-event-yang-diikuti .horizontal-border-DwXFyv {
        --z-index: 0;
        background-color: transparent;
        border-bottom-style: none;
        border-color: #97313133;
        border-left-style: none;
        border-right-style: none;
        border-top-style: solid;
        border-top-width: 1px;
        height: 57px;
        opacity: 1;
        position: relative;
        width: 1265px;
      }

      .page-event-yang-diikuti .container-6UNnxL {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/container.svg);
        background-size: 100% 100%;
        display: inline-flex;
        gap: 24px;
        left: 0px;
        opacity: 1;
        position: absolute;
        top: calc(50% - 6px);
      }

      .page-event-yang-diikuti .container-enQ1rg {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex-direction: column;
        left: 983px;
        opacity: 1;
        position: absolute;
        top: calc(50% + 8px);
      }

      .page-event-yang-diikuti .x2024-island-events-all-rights-reserved-M7zUcX {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #00000099;
        display: flex;
        font-family: "Montserrat", Helvetica;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 20px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      .page-event-yang-diikuti .link-C61RwL {
        --z-index: 2;
        align-items: center;
        background-color: transparent;
        border-radius: 12px;
        display: inline-flex;
        gap: 12px;
        left: 164px;
        opacity: 1;
        padding: 6px 16px;
        position: absolute;
        top: 437px;
      }

      .page-event-yang-diikuti .container-7t8sXf {
        --z-index: 0;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-diikuti .icon-T5KnqE {
        --z-index: 0;
        background-color: transparent;
        height: 28px;
        opacity: 1;
        position: relative;
        width: 24.020000457763672px;
      }

      .page-event-yang-diikuti .vector-bi0ei7 {
        --z-index: 0;
        background-color: transparent;
        background-image: url(https://cdn.animaapp.com/projects/68f4c69f635d110c520a03b2/releases/6903609514873997a61ee2eb/img/vector-9.svg);
        background-size: 100% 100%;
        height: 62.5%;
        left: 13.57%;
        opacity: 1;
        position: absolute;
        top: 18.75%;
        width: 72.86%;
      }

      .page-event-yang-diikuti .container-HqL6vM {
        --z-index: 1;
        align-items: flex-start;
        background-color: transparent;
        display: inline-flex;
        flex: 0 0 auto;
        flex-direction: column;
        opacity: 1;
        position: relative;
      }

      .page-event-yang-diikuti .logout-ps2wI5 {
        --z-index: 0;
        align-items: center;
        background-color: transparent;
        color: #1f2937;
        display: flex;
        font-family: "Inter", Helvetica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        justify-content: center;
        letter-spacing: 0px;
        line-height: 24px;
        margin-top: -1px;
        opacity: 1;
        position: relative;
        text-align: left;
        white-space: nowrap;
        width: fit-content;
      }

      html,
      body {
        max-width: 100%;
        overflow-x: hidden;
      }

      body > div,
      body > main,
      [class^="page-"],
      [class*=" page-"] {
        max-width: 100vw;
        overflow-x: hidden;
      }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body style="margin: 0">
    <input type="hidden" id="anPageName" name="page" value="landing-page" />
    <div
      class="landing-page auto-animated screen"
      data-id="895:178"
      data-page="landing-page"
      data-screens="page-pengaturan-akun,landing-page,jelajah-event-u40semuau41,tentang-kami,page-event-yang-disukai,detail-event,jelajah-event-u40budayau41,jelajah-event-u40musiku41,jelajah-event-u40seniu41,page-event-yang-diikuti"
    >
      <div class="group-navbar-C61RwL" data-id="1076:1180">
        <div class="navbar-utama-DP1VkW" data-id="I1076:1180;1048:669">
          <div
            class="rectangle-1-a2t32t"
            data-id="I1076:1180;1048:669;751:30"
          ></div>
          <div
            class="group-82-a2t32t"
            data-id="I1076:1180;1048:669;981:523"
          ></div>
          <div
            class="logo-a2t32t"
            onclick="Lib.autoanim_redirect('page-pengaturan-akun,landing-page%23landing-page,,,;tentang-kami,landing-page%23landing-page,,,;page-event-yang-disukai,landing-page%23landing-page,,,;detail-event,landing-page%23landing-page,,,;page-event-yang-diikuti,landing-page%23landing-page,,,', event)"
            onmouseover=""
            data-id="I1076:1180;1048:669;1180:1748"
          >
            <div
              class="container-srsPWg"
              data-id="I1076:1180;1048:669;1180:1749"
            >
              <div class="svg-wu39F6" data-id="I1076:1180;1048:669;1180:1750">
                <div
                  class="vector-pIECLt"
                  data-id="I1076:1180;1048:669;1180:1751"
                ></div>
              </div>
            </div>
            <div
              class="heading-1-srsPWg"
              data-id="I1076:1180;1048:669;1180:1752"
            >
              <div
                class="even-tura-dVRD8C"
                data-id="I1076:1180;1048:669;1180:1753"
              >
                EvenTura
              </div>
            </div>
          </div>
          <div class="frame-2-a2t32t" data-id="I1076:1180;1048:669;1051:789">
            <div
              class="frame-93-AWqVf7"
              data-id="I1076:1180;1048:669;1338:3481"
            >
              <div
                class="beranda-IV52nv"
                onclick="Lib.autoanim_redirect('page-pengaturan-akun,landing-page%23landing-page,,ease-in,1022.0937728881836;tentang-kami,landing-page%23landing-page,,ease-in,1022.0937728881836;page-event-yang-disukai,landing-page%23landing-page,,ease-in,1022.0937728881836;detail-event,landing-page%23landing-page,,ease-in,1022.0937728881836;page-event-yang-diikuti,landing-page%23landing-page,,ease-in,1022.0937728881836', event)"
                onmouseover=""
                data-id="I1076:1180;1048:669;822:40"
              >
                Beranda
              </div>
            </div>
            <div
              class="frame-94-AWqVf7"
              data-id="I1076:1180;1048:669;1338:3482"
            >
              <div
                class="event-VuxQoF"
                onclick="Lib.autoanim_redirect('page-pengaturan-akun,landing-page%23jelajah-event-u40semuau41,,ease-in,1022.0937728881836;tentang-kami,landing-page%23jelajah-event-u40semuau41,,ease-in,1022.0937728881836;page-event-yang-disukai,landing-page%23jelajah-event-u40semuau41,,ease-in,1022.0937728881836;detail-event,landing-page%23jelajah-event-u40semuau41,,ease-in,1022.0937728881836;page-event-yang-diikuti,landing-page%23jelajah-event-u40semuau41,,ease-in,1022.0937728881836', event)"
                onmouseover=""
                data-id="I1076:1180;1048:669;751:33"
              >
                Event
              </div>
            </div>
            <div
              class="frame-95-AWqVf7"
              data-id="I1076:1180;1048:669;1338:3483"
            >
              <div
                class="tentang-kami-03dhao"
                onclick="Lib.autoanim_redirect('page-pengaturan-akun,landing-page%23tentang-kami,,ease-in,1022.0937728881836;tentang-kami,landing-page%23tentang-kami,,ease-in,1022.0937728881836;page-event-yang-disukai,landing-page%23tentang-kami,,ease-in,1022.0937728881836;detail-event,landing-page%23tentang-kami,,ease-in,1022.0937728881836;page-event-yang-diikuti,landing-page%23tentang-kami,,ease-in,1022.0937728881836', event)"
                onmouseover=""
                data-id="I1076:1180;1048:669;813:23"
              >
                Tentang Kami
              </div>
            </div>
          </div>
        </div>
        <div
          class="profil-DP1VkW"
          onclick="Lib.autoanim_redirect('page-pengaturan-akun,landing-page%23page-event-yang-diikuti,,,;tentang-kami,landing-page%23page-event-yang-diikuti,,,;page-event-yang-disukai,landing-page%23page-event-yang-diikuti,,,;detail-event,landing-page%23page-event-yang-diikuti,,,;page-event-yang-diikuti,landing-page%23page-event-yang-diikuti,,,', event)"
          onmouseover=""
          data-id="I1076:1180;1048:686"
        >
          <div class="vector-2e1dgV" data-id="I1076:1180;1048:687"></div>
          <div class="vector-gjYGxX" data-id="I1076:1180;1048:688"></div>
        </div>
      </div>
      <div class="container-C61RwL" data-id="1076:1181">
        <div class="footer-utama-tuzc6y" data-id="1182:22085">
          <div class="frame-logo-Z3xR4w" data-id="I1182:22085;1182:4685">
            <div class="logo-6shg9x" data-id="I1182:22085;1180:3688">
              <div class="container-wMWPLg" data-id="I1182:22085;1180:3689">
                <div class="svg-Wf9oC3" data-id="I1182:22085;1180:3690">
                  <div
                    class="vector-gfweEi"
                    data-id="I1182:22085;1180:3691"
                  ></div>
                </div>
              </div>
              <div class="heading-1-wMWPLg" data-id="I1182:22085;1180:3692">
                <div class="even-tura-qxdkx3" data-id="I1182:22085;1180:3693">
                  EvenTura
                </div>
              </div>
            </div>
            <div
              class="website-yang-berfung-6shg9x"
              data-id="I1182:22085;1028:167"
            >
              Website yang berfungsi untuk memberikan kemudahan bagi masyarakat
              dan wisatawan dalam menemukan event event pada setiap daerah di
              Nusantara. Selain itu website ini berfungsi untuk memberikan
              pemahaman terhadap keberagaman event di Nusantara
            </div>
          </div>
          <div class="nav-Z3xR4w" data-id="I1182:22085;1028:123">
            <div class="container-b1OrHs" data-id="I1182:22085;1028:124">
              <div class="link-TVoVcd" data-id="I1182:22085;1182:9696">
                <div class="navigasi-QgQI94" data-id="I1182:22085;1182:9697">
                  Navigasi
                </div>
              </div>
              <div class="link-i7hCqD" data-id="I1182:22085;1028:130">
                <div class="beranda-xTQRpQ" data-id="I1182:22085;1028:131">
                  Beranda
                </div>
              </div>
              <div class="link-lHL0Py" data-id="I1182:22085;1182:15829">
                <div class="event-wQp7mC" data-id="I1182:22085;1182:15830">
                  Event
                </div>
              </div>
              <div class="link-DnfJsR" data-id="I1182:22085;1028:128">
                <div class="tentang-lPxg6h" data-id="I1182:22085;1028:129">
                  Tentang
                </div>
              </div>
            </div>
            <div class="container-Hh7C27" data-id="I1182:22085;1028:136">
              <div
                class="heading-3margin-Ejex1t"
                data-id="I1182:22085;1028:137"
              >
                <div class="heading-3-H9Uiai" data-id="I1182:22085;1028:138">
                  <div class="contact-iwYwCx" data-id="I1182:22085;1028:139">
                    Contact
                  </div>
                </div>
              </div>
              <div class="container-Ejex1t" data-id="I1182:22085;1028:140">
                <div class="link-fP14VL" data-id="I1182:22085;1028:141">
                  <div class="svg-5Ei1Vk" data-id="I1182:22085;1028:142">
                    <div
                      class="vector-U8dFz2"
                      data-id="I1182:22085;1028:143"
                    ></div>
                  </div>
                  <div class="container-5Ei1Vk" data-id="I1182:22085;1028:144">
                    <div
                      class="x1-234-567-890-CeFPzB"
                      data-id="I1182:22085;1028:145"
                    >
                      +1 (234) 567-890
                    </div>
                  </div>
                </div>
                <div class="link-X81PwD" data-id="I1182:22085;1028:146">
                  <div class="svg-q7jzOK" data-id="I1182:22085;1028:147">
                    <div
                      class="vector-E8HFz8"
                      data-id="I1182:22085;1028:148"
                    ></div>
                    <div
                      class="vector-r22zY7"
                      data-id="I1182:22085;1028:149"
                    ></div>
                  </div>
                  <div class="container-q7jzOK" data-id="I1182:22085;1028:150">
                    <div
                      class="contactislandeventscom-5oHJjz"
                      data-id="I1182:22085;1028:151"
                    >
                      contact@islandevents.com
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="frame-bawah-Z3xR4w" data-id="I1182:22085;1028:152">
            <div
              class="horizontal-border-DwXFyv"
              data-id="I1182:22085;1028:153"
            >
              <div
                class="container-6UNnxL"
                data-id="I1182:22085;1028:154"
              ></div>
              <div class="container-enQ1rg" data-id="I1182:22085;1028:164">
                <div
                  class="x2024-island-events-all-rights-reserved-M7zUcX"
                  data-id="I1182:22085;1028:165"
                >
                  © 2024 Island Events. All rights reserved.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mainmargin-tuzc6y" data-id="1076:1182">
          <div class="main-xXn3Dd" data-id="1076:1183">
            <div class="background-shadow-M7OuBP" data-id="1076:1184">
              <div class="container-TkGOxU" data-id="1076:1185">
                <div class="heading-1-PGizWL" data-id="1076:1186">
                  <div class="fadiyah-FIVWdu" data-id="1076:1187">Fadiyah</div>
                </div>
                <div class="container-PGizWL" data-id="1076:1188">
                  <div class="penggemar-seni-budaya-x27PP2" data-id="1076:1189">
                    Penggemar Seni &amp; Budaya
                  </div>
                </div>
                <div class="container-g9xb1E" data-id="1076:1190">
                  <div class="pengguna-s7q6ZA" data-id="1076:1191">
                    Pengguna
                  </div>
                </div>
              </div>
              <div class="button-TkGOxU" data-id="1076:1192">
                <div class="edit-profil-iIkd5c" data-id="1076:1193">
                  Edit Profil
                </div>
              </div>
              <div class="container-CPZfq6" data-id="1076:1194"></div>
            </div>
            <div class="container-M7OuBP" data-id="1073:796">
              <div class="horizontal-border-8ckstU" data-id="1073:797">
                <div class="nav-tabs-N4eFvZ" data-id="1073:798">
                  <div
                    class="link-ktwL6R"
                    onclick="Lib.autoanim_redirect('page-event-yang-disukai,landing-page%23page-event-yang-diikuti,,,', event)"
                    onmouseover=""
                    data-id="1073:799"
                  >
                    <div class="event-favorit-fptWRS" data-id="1073:800">
                      Event Favorit
                    </div>
                  </div>
                  <div
                    class="linkmargin-ktwL6R"
                    onclick="Lib.autoanim_redirect('page-event-yang-diikuti,landing-page%23page-event-yang-disukai,,,', event)"
                    onmouseover=""
                    data-id="1073:801"
                  >
                    <div class="link-CGKJSf" data-id="1073:802">
                      <div class="event-yang-disukai-nfnWeb" data-id="1073:803">
                        Event Yang Disukai
                      </div>
                    </div>
                  </div>
                  <div
                    class="linkmargin-9Kwlq7"
                    onclick="Lib.autoanim_redirect('page-event-yang-disukai,landing-page%23page-pengaturan-akun,,,;page-event-yang-diikuti,landing-page%23page-pengaturan-akun,,,', event)"
                    onmouseover=""
                    data-id="1073:804"
                  >
                    <div class="link-XcrBB4" data-id="1073:805">
                      <div class="pengaturan-akun-Uw1yFZ" data-id="1073:806">
                        Pengaturan Akun
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hader-event-yang-disukai-8ckstU" data-id="1073:1219">
                <div class="event-yang-disukai-OBixeq" data-id="1073:1220">
                  Event Yang disukai
                </div>
              </div>
              <div class="container-event-8ckstU" data-id="1073:1221">
                <div class="container-xOfH1k" data-id="1073:1222">
                  <div class="background-TER5tk" data-id="1073:1223">
                    <div
                      class="festival-tari-tradisional-TC3iyO"
                      data-id="1073:1224"
                    >
                      <div
                        class="weuilike-outlined-AFl44B"
                        data-id="1423:1343"
                      ></div>
                    </div>
                  </div>
                  <div class="container-TER5tk" data-id="1073:1225">
                    <div class="heading-3-link-I5TMxM" data-id="1073:1226">
                      <div class="gandrung-sewu-8MH7q5" data-id="1073:1227">
                        Gandrung Sewu
                      </div>
                    </div>
                    <div class="container-I5TMxM" data-id="1073:1228">
                      <div
                        class="banyuwangi-23-oktober-2025-o8VCb9"
                        data-id="1073:1229"
                      >
                        Banyuwangi, 23 Oktober 2025
                      </div>
                    </div>
                  </div>
                </div>
                <div class="container-QCdsnP" data-id="1073:1230">
                  <div class="background-xiHfBW" data-id="1073:1231">
                    <div class="konser-musik-daerah-H0C7tF" data-id="1073:1232">
                      <div
                        class="weuilike-outlined-Gulp76"
                        data-id="1423:1337"
                      ></div>
                      <div
                        class="weuilike-outlined-i3keDx"
                        data-id="1423:1345"
                      ></div>
                    </div>
                  </div>
                  <div class="container-xiHfBW" data-id="1073:1233">
                    <div class="heading-3-link-6x6bFX" data-id="1073:1234">
                      <div
                        class="sawahlunto-internasional-9QeAhk"
                        data-id="1073:1235"
                      >
                        Sawahlunto Internasional..
                      </div>
                    </div>
                    <div class="container-6x6bFX" data-id="1073:1236">
                      <div
                        class="sawahlunto-10-oktober-2025-MDzMCE"
                        data-id="1073:1237"
                      >
                        Sawahlunto, 10 Oktober 2025
                      </div>
                    </div>
                  </div>
                </div>
                <div class="container-xDp9wi" data-id="1073:1238">
                  <div class="background-xf8R1z" data-id="1073:1239">
                    <div class="pameran-seni-rupa-lYb07m" data-id="1073:1240">
                      <div
                        class="weuilike-outlined-Un9NCc"
                        data-id="1423:1347"
                      ></div>
                    </div>
                  </div>
                  <div class="container-xf8R1z" data-id="1073:1241">
                    <div class="heading-3-link-l4ET6j" data-id="1073:1242">
                      <div class="art-jakarta-pbxxVf" data-id="1073:1243">
                        Art Jakarta
                      </div>
                    </div>
                    <div class="container-l4ET6j" data-id="1073:1244">
                      <div
                        class="jakarta-3-oktober-2025-GXvM30"
                        data-id="1073:1245"
                      >
                        Jakarta, 3 Oktober 2025
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-8ckstU" data-id="1057:776">
                <div class="heading-3-jjp2NI" data-id="1057:777">
                  <div class="event-favorit-4FsIms" data-id="1057:778">
                    Event Favorit
                  </div>
                </div>
                <div class="container-jjp2NI" data-id="1057:779">
                  <div class="event-favorit-dw7Hxw" data-id="1410:1235">
                    <div
                      class="image-nWJ76h"
                      data-id="I1410:1235;1410:1219"
                    ></div>
                    <div
                      class="container-nWJ76h"
                      data-id="I1410:1235;1410:1220"
                    >
                      <div
                        class="container-MTKkaG"
                        data-id="I1410:1235;1410:1221"
                      >
                        <div
                          class="container-CKpVd7"
                          data-id="I1410:1235;1410:1222"
                        >
                          <div
                            class="budaya-e6xmaD"
                            data-id="I1410:1235;1410:1223"
                          >
                            Budaya
                          </div>
                        </div>
                        <div
                          class="heading-4-CKpVd7"
                          data-id="I1410:1235;1410:1224"
                        >
                          <div
                            class="tari-kecak-bpkw47"
                            data-id="I1410:1235;1410:1225"
                          >
                            Tari Kecak
                          </div>
                        </div>
                        <div
                          class="container-xrR8iT"
                          data-id="I1410:1235;1410:1226"
                        >
                          <div
                            class="ikuti-keindahan-tari-kAO2LG"
                            data-id="I1410:1235;1410:1227"
                          >
                            Ikuti keindahan tarian tradisional dari berbagai
                            daerah di Nusantara.
                          </div>
                        </div>
                      </div>
                      <div
                        class="buttonmargin-MTKkaG"
                        data-id="I1410:1235;1410:1228"
                      >
                        <div
                          class="button-9qykPm"
                          onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
                          onmouseover=""
                          data-id="I1410:1235;1410:1229"
                        >
                          <div
                            class="lihat-detail-tnMm2z"
                            data-id="I1410:1235;1410:1230"
                          >
                            Lihat Detail
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      class="material-symbolsbookmark-outline-rounded-nWJ76h"
                      data-id="I1410:1235;1410:1231"
                    ></div>
                  </div>
                  <div class="event-favorit-qrHxGv" data-id="1411:1232">
                    <div
                      class="image-JY7apX"
                      data-id="I1411:1232;1410:1219"
                    ></div>
                    <div
                      class="container-JY7apX"
                      data-id="I1411:1232;1410:1220"
                    >
                      <div
                        class="container-WxUfU1"
                        data-id="I1411:1232;1410:1221"
                      >
                        <div
                          class="container-8uxMr0"
                          data-id="I1411:1232;1410:1222"
                        >
                          <div
                            class="budaya-T7i6BQ"
                            data-id="I1411:1232;1410:1223"
                          >
                            Musik
                          </div>
                        </div>
                        <div
                          class="heading-4-8uxMr0"
                          data-id="I1411:1232;1410:1224"
                        >
                          <div
                            class="tari-kecak-kGDdFM"
                            data-id="I1411:1232;1410:1225"
                          >
                            Solo Keroncong Festival
                          </div>
                        </div>
                        <div
                          class="container-3JjWGk"
                          data-id="I1411:1232;1410:1226"
                        >
                          <div
                            class="ikuti-keindahan-tari-ux2xJN"
                            data-id="I1411:1232;1410:1227"
                          >
                            Nikmati alunan musik etnik yang memukau dari
                            berbagai suku di<br />Nusantara.
                          </div>
                        </div>
                      </div>
                      <div
                        class="buttonmargin-WxUfU1"
                        data-id="I1411:1232;1410:1228"
                      >
                        <div
                          class="button-MHBLUq"
                          onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
                          onmouseover=""
                          data-id="I1411:1232;1410:1229"
                        >
                          <div
                            class="lihat-detail-LzBNGs"
                            data-id="I1411:1232;1410:1230"
                          >
                            Lihat Detail
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      class="material-symbolsbookmark-outline-rounded-JY7apX"
                      data-id="I1411:1232;1410:1231"
                    ></div>
                  </div>
                  <div class="event-favorit-R3xrxH" data-id="1411:1247">
                    <div
                      class="image-Cr1Cxa"
                      data-id="I1411:1247;1410:1219"
                    ></div>
                    <div
                      class="container-Cr1Cxa"
                      data-id="I1411:1247;1410:1220"
                    >
                      <div
                        class="container-PmtSnr"
                        data-id="I1411:1247;1410:1221"
                      >
                        <div
                          class="container-pDScjT"
                          data-id="I1411:1247;1410:1222"
                        >
                          <div
                            class="budaya-vcxqq3"
                            data-id="I1411:1247;1410:1223"
                          >
                            Seni
                          </div>
                        </div>
                        <div
                          class="heading-4-pDScjT"
                          data-id="I1411:1247;1410:1224"
                        >
                          <div
                            class="tari-kecak-DIvDwx"
                            data-id="I1411:1247;1410:1225"
                          >
                            ARTJOG
                          </div>
                        </div>
                        <div
                          class="container-JBhdUz"
                          data-id="I1411:1247;1410:1226"
                        >
                          <div
                            class="ikuti-keindahan-tari-LxYGaI"
                            data-id="I1411:1247;1410:1227"
                          >
                            Saksikan karya seni rupa dari seniman-seniman
                            berbakat di seluruh<br />Nusantara.
                          </div>
                        </div>
                      </div>
                      <div
                        class="buttonmargin-PmtSnr"
                        data-id="I1411:1247;1410:1228"
                      >
                        <div
                          class="button-DIkwuN"
                          onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
                          onmouseover=""
                          data-id="I1411:1247;1410:1229"
                        >
                          <div
                            class="lihat-detail-75Z1vx"
                            data-id="I1411:1247;1410:1230"
                          >
                            Lihat Detail
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      class="material-symbolsbookmark-outline-rounded-Cr1Cxa"
                      data-id="I1411:1247;1410:1231"
                    ></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="link-tuzc6y" data-id="1253:1177">
          <div class="container-dYHTc4" data-id="1253:1178">
            <div class="icon-ZikfZo" data-id="1253:1179">
              <div class="vector-6kvM35" data-id="1253:1180"></div>
            </div>
          </div>
          <div class="container-CxwvYq" data-id="1253:1181">
            <div class="logout-PQP71D" data-id="1253:1182">Logout</div>
          </div>
        </div>
        <div class="container-tuzc6y" data-id="1324:1513">
          <div class="container-0O4qGf" data-id="1030:224">
            <div class="input-HwucOk" data-id="1030:225">
              <div class="container-tx4o88" data-id="1030:226">
                <div class="cari-event-gk9fov" data-id="1030:227">
                  Cari event...
                </div>
              </div>
              <div class="container-4GP36P" data-id="1030:228">
                <div class="container-xa8gsi" data-id="1030:229"></div>
                <div class="margin-xa8gsi" data-id="1030:230"></div>
              </div>
            </div>
            <div class="container-HwucOk" data-id="1030:231">
              <div class="container-wyixDA" data-id="1030:232">
                <div class="icon-H6K5wj" data-id="1030:233">
                  <div class="vector-bvrxXo" data-id="1030:234"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="container-JDzFfr" data-id="1030:235">
            <div class="background-border-Tp120e" data-id="1030:236">
              <div
                class="button-6HRP9x"
                onclick="Lib.autoanim_redirect('jelajah-event-u40seniu41,landing-page%23jelajah-event-u40semuau41,,ease-out,300.00001192092896', event)"
                onmouseover=""
                data-id="1030:237"
              >
                <div class="semua-n0xcSu" data-id="1030:238">Semua</div>
              </div>
              <div
                class="button-qKgOq2"
                onclick="Lib.autoanim_redirect('jelajah-event-u40semuau41,landing-page%23jelajah-event-u40budayau41,,ease-out,300.00001192092896;jelajah-event-u40musiku41,landing-page%23jelajah-event-u40budayau41,,ease-out,300;jelajah-event-u40seniu41,landing-page%23jelajah-event-u40budayau41,,,', event)"
                onmouseover=""
                data-id="1030:239"
              >
                <div class="budaya-oMakLr" data-id="1030:240">Budaya</div>
              </div>
              <div
                class="button-prkIex"
                onclick="Lib.autoanim_redirect('jelajah-event-u40semuau41,landing-page%23jelajah-event-u40musiku41,,ease-out,300.00001192092896;jelajah-event-u40seniu41,landing-page%23jelajah-event-u40musiku41,,ease-out,300.00001192092896', event)"
                onmouseover=""
                data-id="1030:241"
              >
                <div class="musik-3r5CUf" data-id="1030:242">Musik</div>
              </div>
              <div
                class="button-TsOwUt"
                onclick="Lib.autoanim_redirect('jelajah-event-u40semuau41,landing-page%23jelajah-event-u40seniu41,,ease-out,300.00001192092896;jelajah-event-u40musiku41,landing-page%23jelajah-event-u40seniu41,,ease-out,300.00001192092896', event)"
                onmouseover=""
                data-id="1030:243"
              >
                <div class="seni-2a4uZB" data-id="1030:244">Seni</div>
              </div>
            </div>
          </div>
          <div class="heading-2-0O4qGf" data-id="1324:1514">
            <div class="event-yang-akan-datang-b7AqNG" data-id="1324:1515">
              Event Yang Akan Datang
            </div>
          </div>
        </div>
        <div class="frame-event-tuzc6y" data-id="1035:602">
          <div class="group-event-ZQj5rd" data-id="1034:432">
            <div
              class="container-6HBprP"
              onclick="Lib.autoanim_redirect('jelajah-event-u40semuau41,landing-page%23detail-event,,,;jelajah-event-u40budayau41,landing-page%23detail-event,,,;jelajah-event-u40musiku41,landing-page%23detail-event,,,;jelajah-event-u40seniu41,landing-page%23detail-event,,,', event)"
              onmouseover=""
              data-id="I1034:432;1032:322"
            >
              <div class="image-iJXLko" data-id="I1034:432;1032:323"></div>
            </div>
            <div class="container-MeubjC" data-id="I1034:432;1032:324">
              <div class="margin-SRg4Jx" data-id="I1034:432;1032:330">
                <div class="container-1bnNkN" data-id="I1034:432;1032:331">
                  <div class="overlay-VF83bb" data-id="I1034:432;1032:332">
                    <div class="musik-rbbqW3" data-id="I1034:432;1032:333">
                      Budaya
                    </div>
                  </div>
                  <div
                    class="link-VF83bb"
                    onclick="Lib.autoanim_redirect('jelajah-event-u40semuau41,landing-page%23detail-event,,,;jelajah-event-u40budayau41,landing-page%23detail-event,,,;jelajah-event-u40musiku41,landing-page%23detail-event,,,;jelajah-event-u40seniu41,landing-page%23detail-event,,,', event)"
                    onmouseover=""
                    data-id="I1034:432;1032:334"
                  >
                    <div
                      class="lihat-detail-3zJcI6"
                      data-id="I1034:432;1032:335"
                    >
                      Lihat Detail
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-SRg4Jx" data-id="I1034:432;1032:325">
                <div class="container-gIn1ox" data-id="I1034:432;1032:326">
                  <div
                    class="konser-musik-indie-oJsIyX"
                    data-id="I1034:432;1032:327"
                  >
                    Tari Kecak
                  </div>
                </div>
                <div class="container-g5mVxD" data-id="I1034:432;1032:328">
                  <div
                    class="jumat-14-juni-2024-bandung-MYZzWk"
                    data-id="I1034:432;1032:329"
                  >
                    Setiap hari, 18:00-19:00, 19:00-20:00 - Bali
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="group-event-ClCxXZ" data-id="1035:461">
            <div
              class="container-UWpGW2"
              onclick="Lib.autoanim_redirect('jelajah-event-u40semuau41,landing-page%23detail-event,,,;jelajah-event-u40budayau41,landing-page%23detail-event,,,;jelajah-event-u40musiku41,landing-page%23detail-event,,,;jelajah-event-u40seniu41,landing-page%23detail-event,,,', event)"
              onmouseover=""
              data-id="I1035:461;1032:322"
            >
              <div class="image-wZJTIZ" data-id="I1035:461;1032:323"></div>
            </div>
            <div class="container-RcUxxa" data-id="I1035:461;1032:324">
              <div class="margin-HbMBN9" data-id="I1035:461;1032:330">
                <div class="container-LIJ3Ng" data-id="I1035:461;1032:331">
                  <div class="overlay-Iox1J3" data-id="I1035:461;1032:332">
                    <div class="musik-ne6wyy" data-id="I1035:461;1032:333">
                      Budaya
                    </div>
                  </div>
                  <div
                    class="link-Iox1J3"
                    onclick="Lib.autoanim_redirect('jelajah-event-u40semuau41,landing-page%23detail-event,,,;jelajah-event-u40budayau41,landing-page%23detail-event,,,;jelajah-event-u40musiku41,landing-page%23detail-event,,,;jelajah-event-u40seniu41,landing-page%23detail-event,,,', event)"
                    onmouseover=""
                    data-id="I1035:461;1032:334"
                  >
                    <div
                      class="lihat-detail-mN92du"
                      data-id="I1035:461;1032:335"
                    >
                      Lihat Detail
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-HbMBN9" data-id="I1035:461;1032:325">
                <div class="container-AdvYEi" data-id="I1035:461;1032:326">
                  <div
                    class="konser-musik-indie-QH5jde"
                    data-id="I1035:461;1032:327"
                  >
                    Gandrung Sewu
                  </div>
                </div>
                <div class="container-TaT5Qx" data-id="I1035:461;1032:328">
                  <div
                    class="jumat-14-juni-2024-bandung-NsAhyT"
                    data-id="I1035:461;1032:329"
                  >
                    Oktober 2025 - Banyuwangi
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="group-event-u4eP1n" data-id="1035:476">
            <div
              class="container-ve44sX"
              onclick="Lib.autoanim_redirect('jelajah-event-u40semuau41,landing-page%23detail-event,,,;jelajah-event-u40budayau41,landing-page%23detail-event,,,;jelajah-event-u40musiku41,landing-page%23detail-event,,,;jelajah-event-u40seniu41,landing-page%23detail-event,,,', event)"
              onmouseover=""
              data-id="I1035:476;1032:322"
            >
              <div class="image-L6oAi1" data-id="I1035:476;1032:323"></div>
            </div>
            <div class="container-tvbMP9" data-id="I1035:476;1032:324">
              <div class="margin-gknqd7" data-id="I1035:476;1032:330">
                <div class="container-JY6Ycb" data-id="I1035:476;1032:331">
                  <div class="overlay-DXnM6d" data-id="I1035:476;1032:332">
                    <div class="musik-hKDDRr" data-id="I1035:476;1032:333">
                      Budaya
                    </div>
                  </div>
                  <div
                    class="link-DXnM6d"
                    onclick="Lib.autoanim_redirect('jelajah-event-u40semuau41,landing-page%23detail-event,,,;jelajah-event-u40budayau41,landing-page%23detail-event,,,;jelajah-event-u40musiku41,landing-page%23detail-event,,,;jelajah-event-u40seniu41,landing-page%23detail-event,,,', event)"
                    onmouseover=""
                    data-id="I1035:476;1032:334"
                  >
                    <div
                      class="lihat-detail-ScnGlO"
                      data-id="I1035:476;1032:335"
                    >
                      Lihat Detail
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-gknqd7" data-id="I1035:476;1032:325">
                <div class="container-hgqrsa" data-id="I1035:476;1032:326">
                  <div
                    class="konser-musik-indie-oqnjXv"
                    data-id="I1035:476;1032:327"
                  >
                    Perang Topat
                  </div>
                </div>
                <div class="container-oiZBiB" data-id="I1035:476;1032:328">
                  <div
                    class="jumat-14-juni-2024-bandung-QRp4Eb"
                    data-id="I1035:476;1032:329"
                  >
                    Sabtu, 29 November 2025 - Lombok Barat
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="group-event-y8OG5Z" data-id="1035:512">
            <div
              class="container-SnxG9e"
              onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
              onmouseover=""
              data-id="I1035:512;1032:322"
            >
              <div class="image-5dpvns" data-id="I1035:512;1032:323"></div>
            </div>
            <div class="container-QxakxC" data-id="I1035:512;1032:324">
              <div class="margin-VtWacv" data-id="I1035:512;1032:330">
                <div class="container-tn5wOB" data-id="I1035:512;1032:331">
                  <div class="overlay-opSC1N" data-id="I1035:512;1032:332">
                    <div class="musik-AnwXjV" data-id="I1035:512;1032:333">
                      Musik
                    </div>
                  </div>
                  <div
                    class="link-opSC1N"
                    onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
                    onmouseover=""
                    data-id="I1035:512;1032:334"
                  >
                    <div
                      class="lihat-detail-yaHA5D"
                      data-id="I1035:512;1032:335"
                    >
                      Lihat Detail
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-VtWacv" data-id="I1035:512;1032:325">
                <div class="container-oP40vu" data-id="I1035:512;1032:326">
                  <div
                    class="konser-musik-indie-NNDLso"
                    data-id="I1035:512;1032:327"
                  >
                    Sawahlunto International Music..
                  </div>
                </div>
                <div class="container-28QYkS" data-id="I1035:512;1032:328">
                  <div
                    class="jumat-14-juni-2024-bandung-LmeN49"
                    data-id="I1035:512;1032:329"
                  >
                    Kamis, 10 Oktober 2025 - Suamtera Barat
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="group-event-JjBYgc" data-id="1035:527">
            <div
              class="container-KUlwI2"
              onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
              onmouseover=""
              data-id="I1035:527;1032:322"
            >
              <div class="image-xGB324" data-id="I1035:527;1032:323"></div>
            </div>
            <div class="container-YvRBMR" data-id="I1035:527;1032:324">
              <div class="margin-m3DgbK" data-id="I1035:527;1032:330">
                <div class="container-qjbG1z" data-id="I1035:527;1032:331">
                  <div class="overlay-FaYKIK" data-id="I1035:527;1032:332">
                    <div class="musik-gxsawd" data-id="I1035:527;1032:333">
                      Musik
                    </div>
                  </div>
                  <div
                    class="link-FaYKIK"
                    onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
                    onmouseover=""
                    data-id="I1035:527;1032:334"
                  >
                    <div
                      class="lihat-detail-EUtmdI"
                      data-id="I1035:527;1032:335"
                    >
                      Lihat Detail
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-m3DgbK" data-id="I1035:527;1032:325">
                <div class="container-JDVP8k" data-id="I1035:527;1032:326">
                  <div
                    class="konser-musik-indie-U8hDe4"
                    data-id="I1035:527;1032:327"
                  >
                    Solo Keroncong Festival
                  </div>
                </div>
                <div class="container-3x7fL0" data-id="I1035:527;1032:328">
                  <div
                    class="jumat-14-juni-2024-bandung-APfnpc"
                    data-id="I1035:527;1032:329"
                  >
                    Jumat, 25 Juli 2025 - Solo
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="group-event-Uw8hfZ" data-id="1035:542">
            <div
              class="container-APRxxb"
              onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
              onmouseover=""
              data-id="I1035:542;1032:322"
            >
              <div class="image-Q8KIxu" data-id="I1035:542;1032:323"></div>
            </div>
            <div class="container-tJXEsd" data-id="I1035:542;1032:324">
              <div class="margin-XJeo1s" data-id="I1035:542;1032:330">
                <div class="container-vaDxos" data-id="I1035:542;1032:331">
                  <div class="overlay-n335Wz" data-id="I1035:542;1032:332">
                    <div class="musik-ILIWvm" data-id="I1035:542;1032:333">
                      Musik
                    </div>
                  </div>
                  <div
                    class="link-n335Wz"
                    onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
                    onmouseover=""
                    data-id="I1035:542;1032:334"
                  >
                    <div
                      class="lihat-detail-2Lf3oN"
                      data-id="I1035:542;1032:335"
                    >
                      Lihat Detail
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-XJeo1s" data-id="I1035:542;1032:325">
                <div class="container-Cr6oDX" data-id="I1035:542;1032:326">
                  <div
                    class="konser-musik-indie-EHXxeS"
                    data-id="I1035:542;1032:327"
                  >
                    Festival Musik Tong-Tong
                  </div>
                </div>
                <div class="container-xdPjnP" data-id="I1035:542;1032:328">
                  <div
                    class="jumat-14-juni-2024-bandung-FjIS1x"
                    data-id="I1035:542;1032:329"
                  >
                    Sabtu, 18 Oktober 2025 - Sumenep, Jawa Timur
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="group-event-Ws2MfP" data-id="1035:557">
            <div
              class="container-PJvxIR"
              onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
              onmouseover=""
              data-id="I1035:557;1032:322"
            >
              <div class="image-4zxa65" data-id="I1035:557;1032:323"></div>
            </div>
            <div class="container-AkbCPl" data-id="I1035:557;1032:324">
              <div class="margin-YiZxMv" data-id="I1035:557;1032:330">
                <div class="container-W4xtCc" data-id="I1035:557;1032:331">
                  <div class="overlay-wQSlVS" data-id="I1035:557;1032:332">
                    <div class="musik-MsTSi3" data-id="I1035:557;1032:333">
                      Seni
                    </div>
                  </div>
                  <div
                    class="link-wQSlVS"
                    onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
                    onmouseover=""
                    data-id="I1035:557;1032:334"
                  >
                    <div
                      class="lihat-detail-BF4x7k"
                      data-id="I1035:557;1032:335"
                    >
                      Lihat Detail
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-YiZxMv" data-id="I1035:557;1032:325">
                <div class="container-x4DSmc" data-id="I1035:557;1032:326">
                  <div
                    class="konser-musik-indie-EC7Hxg"
                    data-id="I1035:557;1032:327"
                  >
                    ARTJOG
                  </div>
                </div>
                <div class="container-vmsYG3" data-id="I1035:557;1032:328">
                  <div
                    class="jumat-14-juni-2024-bandung-A122xD"
                    data-id="I1035:557;1032:329"
                  >
                    Jumat, 20 Juni 2025 - Jogjakarta
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="group-event-0HhchJ" data-id="1035:572">
            <div
              class="container-FPSI7B"
              onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
              onmouseover=""
              data-id="I1035:572;1032:322"
            >
              <div class="image-9dFjgD" data-id="I1035:572;1032:323"></div>
            </div>
            <div class="container-wQ38DY" data-id="I1035:572;1032:324">
              <div class="margin-0xEZen" data-id="I1035:572;1032:330">
                <div class="container-NshazQ" data-id="I1035:572;1032:331">
                  <div class="overlay-Lj88qt" data-id="I1035:572;1032:332">
                    <div class="musik-5AJQxK" data-id="I1035:572;1032:333">
                      Musik
                    </div>
                  </div>
                  <div
                    class="link-Lj88qt"
                    onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
                    onmouseover=""
                    data-id="I1035:572;1032:334"
                  >
                    <div
                      class="lihat-detail-qcAkkI"
                      data-id="I1035:572;1032:335"
                    >
                      Lihat Detail
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-0xEZen" data-id="I1035:572;1032:325">
                <div class="container-trZgSe" data-id="I1035:572;1032:326">
                  <div
                    class="konser-musik-indie-2UmqrH"
                    data-id="I1035:572;1032:327"
                  >
                    Art Jakarta
                  </div>
                </div>
                <div class="container-HLTx4n" data-id="I1035:572;1032:328">
                  <div
                    class="jumat-14-juni-2024-bandung-8exeEL"
                    data-id="I1035:572;1032:329"
                  >
                    Jumat, 3-5 Oktober 2025 - Jakarta
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="group-event-ndXNxS" data-id="1035:587">
            <div
              class="container-BqwiSt"
              onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
              onmouseover=""
              data-id="I1035:587;1032:322"
            >
              <div class="image-BVgTVG" data-id="I1035:587;1032:323"></div>
            </div>
            <div class="container-eD5juu" data-id="I1035:587;1032:324">
              <div class="margin-Wxiu4y" data-id="I1035:587;1032:330">
                <div class="container-LqrdgL" data-id="I1035:587;1032:331">
                  <div class="overlay-zOhzKO" data-id="I1035:587;1032:332">
                    <div class="musik-0xowVU" data-id="I1035:587;1032:333">
                      Musik
                    </div>
                  </div>
                  <div
                    class="link-zOhzKO"
                    onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
                    onmouseover=""
                    data-id="I1035:587;1032:334"
                  >
                    <div
                      class="lihat-detail-pADsEl"
                      data-id="I1035:587;1032:335"
                    >
                      Lihat Detail
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-Wxiu4y" data-id="I1035:587;1032:325">
                <div class="container-X2h4Rk" data-id="I1035:587;1032:326">
                  <div
                    class="konser-musik-indie-9C0x86"
                    data-id="I1035:587;1032:327"
                  >
                    Tubaba Art Festival
                  </div>
                </div>
                <div class="container-qzriCM" data-id="I1035:587;1032:328">
                  <div
                    class="jumat-14-juni-2024-bandung-Ud6sc0"
                    data-id="I1035:587;1032:329"
                  >
                    27 September - 01&nbsp;&nbsp;Oktober 2025 - Lampung
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="group-navbar-tuzc6y" data-id="1048:690">
          <div class="navbar-utama-Sd2iYW" data-id="I1048:690;1048:669">
            <div
              class="rectangle-1-CEpvzl"
              data-id="I1048:690;1048:669;751:30"
            ></div>
            <div
              class="group-82-CEpvzl"
              data-id="I1048:690;1048:669;981:523"
            ></div>
            <div
              class="logo-CEpvzl"
              onclick="Lib.autoanim_redirect('jelajah-event-u40semuau41,landing-page%23landing-page,,,;jelajah-event-u40budayau41,landing-page%23landing-page,,,;jelajah-event-u40musiku41,landing-page%23landing-page,,,;jelajah-event-u40seniu41,landing-page%23landing-page,,,', event)"
              onmouseover=""
              data-id="I1048:690;1048:669;1180:1748"
            >
              <div
                class="container-cefsQo"
                data-id="I1048:690;1048:669;1180:1749"
              >
                <div class="svg-g0o5N4" data-id="I1048:690;1048:669;1180:1750">
                  <div
                    class="vector-a6SbKW"
                    data-id="I1048:690;1048:669;1180:1751"
                  ></div>
                </div>
              </div>
              <div
                class="heading-1-cefsQo"
                data-id="I1048:690;1048:669;1180:1752"
              >
                <div
                  class="even-tura-P6utxz"
                  data-id="I1048:690;1048:669;1180:1753"
                >
                  EvenTura
                </div>
              </div>
            </div>
            <div class="frame-2-CEpvzl" data-id="I1048:690;1048:669;1051:789">
              <div
                class="frame-93-2du5Ul"
                data-id="I1048:690;1048:669;1338:3481"
              >
                <div
                  class="beranda-sVjxRp"
                  onclick="Lib.autoanim_redirect('jelajah-event-u40semuau41,landing-page%23landing-page,,ease-in,1022.0937728881836;jelajah-event-u40budayau41,landing-page%23landing-page,,ease-in,1022.0937728881836;jelajah-event-u40musiku41,landing-page%23landing-page,,ease-in,1022.0937728881836;jelajah-event-u40seniu41,landing-page%23landing-page,,ease-in,1022.0937728881836', event)"
                  onmouseover=""
                  data-id="I1048:690;1048:669;822:40"
                >
                  Beranda
                </div>
              </div>
              <div
                class="frame-94-2du5Ul"
                data-id="I1048:690;1048:669;1338:3482"
              >
                <div
                  class="event-lYUACE"
                  onclick="Lib.autoanim_redirect('jelajah-event-u40semuau41,landing-page%23jelajah-event-u40semuau41,,ease-in,1022.0937728881836;jelajah-event-u40budayau41,landing-page%23jelajah-event-u40semuau41,,ease-in,1022.0937728881836;jelajah-event-u40musiku41,landing-page%23jelajah-event-u40semuau41,,ease-in,1022.0937728881836;jelajah-event-u40seniu41,landing-page%23jelajah-event-u40semuau41,,ease-in,1022.0937728881836', event)"
                  onmouseover=""
                  data-id="I1048:690;1048:669;751:33"
                >
                  Event
                </div>
              </div>
              <div
                class="frame-95-2du5Ul"
                data-id="I1048:690;1048:669;1338:3483"
              >
                <div
                  class="tentang-kami-nh1cl6"
                  onclick="Lib.autoanim_redirect('jelajah-event-u40semuau41,landing-page%23tentang-kami,,ease-in,1022.0937728881836;jelajah-event-u40budayau41,landing-page%23tentang-kami,,ease-in,1022.0937728881836;jelajah-event-u40musiku41,landing-page%23tentang-kami,,ease-in,1022.0937728881836;jelajah-event-u40seniu41,landing-page%23tentang-kami,,ease-in,1022.0937728881836', event)"
                  onmouseover=""
                  data-id="I1048:690;1048:669;813:23"
                >
                  Tentang Kami
                </div>
              </div>
            </div>
          </div>
          <div
            class="profil-Sd2iYW"
            onclick="Lib.autoanim_redirect('jelajah-event-u40semuau41,landing-page%23page-event-yang-diikuti,,,;jelajah-event-u40budayau41,landing-page%23page-event-yang-diikuti,,,;jelajah-event-u40musiku41,landing-page%23page-event-yang-diikuti,,,;jelajah-event-u40seniu41,landing-page%23page-event-yang-diikuti,,,', event)"
            onmouseover=""
            data-id="I1048:690;1048:686"
          >
            <div class="vector-FfOBle" data-id="I1048:690;1048:687"></div>
            <div class="vector-xxzdKy" data-id="I1048:690;1048:688"></div>
          </div>
        </div>
        <div
          class="hero-section-tuzc6y"
          data-id="1411:1290-412d4a47-e3b0-444b-a06c-78ecbf348429"
        >
          <div class="container-wKDh9e" data-id="I1411:1290;1411:1282">
            <div class="container-iv3BYm" data-id="I1411:1290;1411:1283">
              <div class="heading-2-vGHM30" data-id="I1411:1290;1411:1284">
                <h1
                  class="jelajahi-event-nusantara-FcvfKb"
                  data-id="I1411:1290;1411:1285"
                >
                  Jelajahi Event Nusantara
                </h1>
              </div>
              <div class="container-vGHM30" data-id="I1411:1290;1411:1286">
                <div
                  class="temukan-berbagai-aca-LrR0Ll"
                  data-id="I1411:1290;1411:1287"
                >
                  Temukan berbagai acara menarik di seluruh Nusantara, mulai
                  dari<br />festival budaya hingga konser musik.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="frame-84-tuzc6y" data-id="1191:1069">
          <div class="horizontal-border-KOnkAG" data-id="1191:1053">
            <div class="nav-tabs-xoDX3N" data-id="1191:1054">
              <div
                class="link-2fTo3w"
                onclick="Lib.autoanim_redirect('%2A,landing-page%23page-event-yang-diikuti,,,', event)"
                onmouseover=""
                data-id="1191:1055"
              >
                <div class="event-favorit-sDTcee" data-id="1191:1056">
                  Event Favorit
                </div>
              </div>
              <div
                class="linkmargin-2fTo3w"
                onclick="Lib.autoanim_redirect('%2A,landing-page%23page-event-yang-disukai,,,', event)"
                onmouseover=""
                data-id="1191:1057"
              >
                <div class="link-gpEdaj" data-id="1191:1058">
                  <div class="event-yang-disukai-99aFV1" data-id="1191:1059">
                    Event Yang Disukai
                  </div>
                </div>
              </div>
              <div class="linkmargin-IlCiqr" data-id="1191:1060">
                <div class="link-1q54WW" data-id="1191:1061">
                  <div class="pengaturan-akun-UGCHFd" data-id="1191:1062">
                    Pengaturan Akun
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container-KOnkAG" data-id="1076:1364">
            <div class="container-iKiasL" data-id="1076:1365">
              <div class="container-0TsBdx" data-id="1076:1366">
                <div class="label-nama-17uyI3" data-id="1076:1367">Nama</div>
                <div class="container-17uyI3" data-id="1076:1368">
                  <div class="input-VLqWxX" data-id="1076:1369">
                    <div class="container-C3beqk" data-id="1076:1370">
                      <div class="clara-wijaya-TAVsLj" data-id="1076:1371">
                        Clara Wijaya
                      </div>
                    </div>
                  </div>
                  <div class="container-VLqWxX" data-id="1076:1372">
                    <div class="icon-CMaAJH" data-id="1076:1373">
                      <div class="vector-E09d5F" data-id="1076:1374"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container-F2Rl94" data-id="1076:1375">
                <div class="label-email-aLLCs5" data-id="1076:1376">Email</div>
                <div class="container-aLLCs5" data-id="1076:1377">
                  <div class="input-jloOAs" data-id="1076:1378">
                    <div class="container-86pclk" data-id="1076:1379">
                      <div
                        class="clarawijayaexamplecom-lnxjcK"
                        data-id="1076:1380"
                      >
                        clara.wijaya@example.com
                      </div>
                    </div>
                  </div>
                  <div class="container-jloOAs" data-id="1076:1381">
                    <div class="icon-A7ka3K" data-id="1076:1382">
                      <div class="vector-xsAnTq" data-id="1076:1383"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container-DuHS4G" data-id="1076:1384">
              <div class="button-64zqwg" data-id="1076:1385">
                <div class="simpan-perubahan-UZJch0" data-id="1076:1386">
                  Simpan Perubahan
                </div>
              </div>
              <div class="button-t80Ka5" data-id="1076:1387">
                <div class="ubah-kata-sandi-Dx7oaP" data-id="1076:1388">
                  Ubah Kata Sandi
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container-SzHptm" data-id="1324:1520">
          <div
            class="overlay-shadow-IqtXkx"
            onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
            onmouseover=""
            data-id="1324:1521"
          >
            <div
              class="dieng-culture-festival-i0787q"
              data-id="1324:1522-644f85db-a4a0-4806-98d0-f4bf5609fccd"
            ></div>
            <div class="gradient-i0787q" data-id="1324:1523"></div>
            <div class="container-i0787q" data-id="1324:1524">
              <div class="overlay-Dq4CPi" data-id="1324:1525">
                <div class="budaya-WxjmlD" data-id="1324:1526">Budaya</div>
              </div>
              <div class="heading-3-Dq4CPi" data-id="1324:1527">
                <div class="festival-teluk-tomini-wfxVPg" data-id="1324:1528">
                  Festival Teluk Tomini
                </div>
              </div>
              <div class="container-Dq4CPi" data-id="1324:1529">
                <div class="margin-7eaTKT" data-id="1324:1530">
                  <div class="calendar_today-lvnVfz" data-id="1324:1531">
                    calendar_today
                  </div>
                </div>
                <div class="container-7eaTKT" data-id="1324:1532">
                  <div class="x20-22-november-2025-y2lrzM" data-id="1324:1533">
                    20-22 November 2025
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="overlay-shadow-jZFcQ9"
            onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
            onmouseover=""
            data-id="1324:1534"
          >
            <div
              class="solo-international-performing-arts-pjPLCN"
              data-id="1324:1535-ba626dd9-dbcb-44c8-83be-26981f45ce5a"
            ></div>
            <div class="gradient-pjPLCN" data-id="1324:1536"></div>
            <div class="container-pjPLCN" data-id="1324:1537">
              <div class="overlay-9o6NIf" data-id="1324:1538">
                <div class="musik-XejOzs" data-id="1324:1539">Musik</div>
              </div>
              <div class="heading-3-9o6NIf" data-id="1324:1540">
                <div class="ngayogjazz-vjyijc" data-id="1324:1541">
                  Ngayogjazz
                </div>
              </div>
              <div class="container-9o6NIf" data-id="1324:1542">
                <div class="margin-BxPfQ4" data-id="1324:1543">
                  <div class="calendar_today-WwskwY" data-id="1324:1544">
                    calendar_today
                  </div>
                </div>
                <div class="container-BxPfQ4" data-id="1324:1545">
                  <div class="x15-november-2025-LHaY2F" data-id="1324:1546">
                    <span
                      ><span class="span0-atUVTE">15 November</span
                      ><span class="span1-atUVTE"> 2025</span></span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="overlay-shadow-M6I83p"
            onclick="Lib.autoanim_redirect('%2A,landing-page%23detail-event,,,', event)"
            onmouseover=""
            data-id="1324:1547"
          >
            <div
              class="festival-kuliner-nusantara-sWymdG"
              data-id="1324:1548-cd5f19e1-f83a-4b3d-b2b6-2d961960477a"
            ></div>
            <div class="gradient-sWymdG" data-id="1324:1549"></div>
            <div class="container-sWymdG" data-id="1324:1550">
              <div class="overlay-E8YMWw" data-id="1324:1551">
                <div class="seni-xEfpWw" data-id="1324:1552">Seni</div>
              </div>
              <div class="heading-3-E8YMWw" data-id="1324:1553">
                <div class="festival-nusa-dua-3wofCL" data-id="1324:1554">
                  Festival Nusa Dua
                </div>
              </div>
              <div class="container-E8YMWw" data-id="1324:1555">
                <div class="margin-mbJ2bX" data-id="1324:1556">
                  <div class="calendar_today-rCuuB3" data-id="1324:1557">
                    calendar_today
                  </div>
                </div>
                <div class="container-mbJ2bX" data-id="1324:1558">
                  <div class="x25-26-oktober-2025-HRf176" data-id="1324:1559">
                    <span
                      ><span class="span0-5Wj7Xw">25-26 Oktober</span
                      ><span class="span1-5Wj7Xw"> 2025</span></span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="button-tuzc6y" data-id="1237:2217">
          <div class="tambahkan-ke-favorit-8IlxlK" data-id="1237:2218">
            Tambahkan ke Favorit
          </div>
        </div>
        <div class="button-SzHptm" data-id="1237:2219">
          <div class="container-eB1mwJ" data-id="1237:2220">
            <div class="icon-j5vKw7" data-id="1237:2221">
              <div class="vector-xxzcrh" data-id="1237:2222"></div>
            </div>
          </div>
          <div class="bagikan-eB1mwJ" data-id="1237:2223">Bagikan</div>
        </div>
        <div class="container-search-tuzc6y" data-id="1040:396">
          <div class="container-8j71Q9" data-id="1182:22206">
            <div class="container-t4RqfS" data-id="1182:22207">
              <div class="input-AdN2HU" data-id="1182:22208">
                <div class="container-alhvuH" data-id="1182:22209">
                  <div class="cari-event-8fHkYM" data-id="1182:22210">
                    Cari event...
                  </div>
                </div>
                <div class="container-eMoxEz" data-id="1182:22211">
                  <div class="container-mx8Hr6" data-id="1182:22212"></div>
                  <div class="margin-mx8Hr6" data-id="1182:22213"></div>
                </div>
              </div>
              <div class="container-AdN2HU" data-id="1182:22214">
                <div class="container-3GC9fT" data-id="1182:22215">
                  <div class="icon-Pf8sqO" data-id="1182:22216">
                    <div class="vector-C4rN2A" data-id="1182:22217"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container-c4zroR" data-id="1184:22264">
              <div class="background-border-IGoxOx" data-id="1184:22265">
                <div
                  class="button-xMOCxz"
                  onclick="Lib.autoanim_redirect('%2A,landing-page%23jelajah-event-u40semuau41,,ease-out,300.00001192092896', event)"
                  onmouseover=""
                  data-id="1184:22266"
                >
                  <div class="semua-1Ry6KE" data-id="1184:22267">Semua</div>
                </div>
                <div class="button-Lwwq8d" data-id="1184:22268">
                  <div class="budaya-Vq0vsx" data-id="1184:22269">Budaya</div>
                </div>
                <div
                  class="button-0ad3qG"
                  onclick="Lib.autoanim_redirect('%2A,landing-page%23jelajah-event-u40musiku41,,ease-out,300.00001192092896', event)"
                  onmouseover=""
                  data-id="1184:22270"
                >
                  <div class="musik-aTuQ1t" data-id="1184:22271">Musik</div>
                </div>
                <div
                  class="button-8OhA1c"
                  onclick="Lib.autoanim_redirect('%2A,landing-page%23jelajah-event-u40seniu41,,ease-out,300.00001192092896', event)"
                  onmouseover=""
                  data-id="1184:22272"
                >
                  <div class="seni-M4pZ78" data-id="1184:22273">Seni</div>
                </div>
              </div>
            </div>
          </div>
          <div class="container-XZM1Sb" data-id="1040:408">
            <div class="background-border-wwzARh" data-id="1040:409">
              <div class="button-N61Xxl" data-id="1040:410">
                <div class="semua-Fxbx5p" data-id="1040:411">Semua</div>
              </div>
              <div class="button-9GG7N5" data-id="1040:412">
                <div class="budaya-O1lQV1" data-id="1040:413">Budaya</div>
              </div>
              <div class="button-RIl1UF" data-id="1040:414">
                <div class="musik-XiQysS" data-id="1040:415">Musik</div>
              </div>
              <div class="button-FbkxkT" data-id="1040:416">
                <div class="seni-js9AMv" data-id="1040:417">Seni</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-utama-C61RwL" data-id="1028:170">
        <div class="frame-logo-3eZSOx" data-id="I1028:170;1182:4685">
          <div class="logo-Pgxc7x" data-id="I1028:170;1180:3688">
            <div class="container-sUvk8b" data-id="I1028:170;1180:3689">
              <div class="svg-VQyxHR" data-id="I1028:170;1180:3690">
                <div class="vector-ejE7rO" data-id="I1028:170;1180:3691"></div>
              </div>
            </div>
            <div class="heading-1-sUvk8b" data-id="I1028:170;1180:3692">
              <div class="even-tura-IpDSj6" data-id="I1028:170;1180:3693">
                EvenTura
              </div>
            </div>
          </div>
          <div class="website-yang-berfung-Pgxc7x" data-id="I1028:170;1028:167">
            Website yang berfungsi untuk memberikan kemudahan bagi masyarakat
            dan wisatawan dalam menemukan event event pada setiap daerah di
            Nusantara. Selain itu website ini berfungsi untuk memberikan
            pemahaman terhadap keberagaman event di Nusantara
          </div>
        </div>
        <div class="nav-3eZSOx" data-id="I1028:170;1028:123">
          <div class="container-RZeYIV" data-id="I1028:170;1028:124">
            <div class="link-mWGqFj" data-id="I1028:170;1182:9696">
              <div class="navigasi-wNQZ9O" data-id="I1028:170;1182:9697">
                Navigasi
              </div>
            </div>
            <div class="link-fWKIJf" data-id="I1028:170;1028:130">
              <div class="beranda-Mrxkqc" data-id="I1028:170;1028:131">
                Beranda
              </div>
            </div>
            <div class="link-I6ZvsF" data-id="I1028:170;1182:15829">
              <div class="event-wGx39P" data-id="I1028:170;1182:15830">
                Event
              </div>
            </div>
            <div class="link-hKxgom" data-id="I1028:170;1028:128">
              <div class="tentang-9hpzZF" data-id="I1028:170;1028:129">
                Tentang
              </div>
            </div>
          </div>
          <div class="container-Y6woBX" data-id="I1028:170;1028:136">
            <div class="heading-3margin-51t4qf" data-id="I1028:170;1028:137">
              <div class="heading-3-gPjpGW" data-id="I1028:170;1028:138">
                <div class="contact-K7WKxQ" data-id="I1028:170;1028:139">
                  Contact
                </div>
              </div>
            </div>
            <div class="container-51t4qf" data-id="I1028:170;1028:140">
              <div class="link-L2i7IC" data-id="I1028:170;1028:141">
                <div class="svg-rqKBhx" data-id="I1028:170;1028:142">
                  <div class="vector-0kQQsO" data-id="I1028:170;1028:143"></div>
                </div>
                <div class="container-rqKBhx" data-id="I1028:170;1028:144">
                  <div
                    class="x1-234-567-890-ZVOhKv"
                    data-id="I1028:170;1028:145"
                  >
                    +1 (234) 567-890
                  </div>
                </div>
              </div>
              <div class="link-v8VhXO" data-id="I1028:170;1028:146">
                <div class="svg-t1txZ5" data-id="I1028:170;1028:147">
                  <div class="vector-hcsrO5" data-id="I1028:170;1028:148"></div>
                  <div class="vector-JQBuDP" data-id="I1028:170;1028:149"></div>
                </div>
                <div class="container-t1txZ5" data-id="I1028:170;1028:150">
                  <div
                    class="contactislandeventscom-A8kzgc"
                    data-id="I1028:170;1028:151"
                  >
                    contact@islandevents.com
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="frame-bawah-3eZSOx" data-id="I1028:170;1028:152">
          <div class="horizontal-border-6CnNgz" data-id="I1028:170;1028:153">
            <div class="container-ACU6MY" data-id="I1028:170;1028:154"></div>
            <div class="container-TZinLO" data-id="I1028:170;1028:164">
              <div
                class="x2024-island-events-all-rights-reserved-MVia0s"
                data-id="I1028:170;1028:165"
              >
                © 2024 Island Events. All rights reserved.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="rectangle-117-C61RwL" data-id="895:180"></div>
      <div class="rectangle-134-C61RwL" data-id="905:100"></div>
      <div class="musik-C61RwL" data-id="895:185">MUSIK</div>
      <div class="line-25-C61RwL" data-id="895:187"></div>
      <div class="drama-tari-yang-meme-C61RwL" data-id="895:194">
        drama tari yang mementaskan kisah epos Ramayana dengan alunan suara
        &#34;cak&#34; dari puluhan penari laki-laki sebagai musik pengiring
        utama, dan diiringi gerakan serta tarian yang memukau.
      </div>
      <div class="rectangle-125-C61RwL" data-id="895:218"></div>
      <div
        class="group-jelajahi-event-C61RwL"
        onclick="Lib.autoanim_redirect('%2A,landing-page%23jelajah-event-u40semuau41,,,', event)"
        onmouseover=""
        data-id="1048:776"
      >
        <div class="rectangle-150-NdkEjV" data-id="990:49"></div>
        <div class="jelajahi-event-NdkEjV" data-id="990:50">Jelajahi Event</div>
      </div>
      <div class="jelajahi-keindahan-n-C61RwL" data-id="895:226">
        Jelajahi Keindahan Nusantara Melalui Event Daerah
      </div>
      <div class="temukan-beragam-even-C61RwL" data-id="895:227">
        Temukan beragam event daerah dari kategori budaya hingga seni yang
        memukau di Nusantara
      </div>
      <div class="kategori-event-C61RwL" data-id="895:231">Kategori Event</div>
      <div class="rectangle-133-C61RwL" data-id="903:253"></div>
      <div class="rectangle-135-C61RwL" data-id="905:148"></div>
      <div class="festival-ini-dilaksa-C61RwL" data-id="905:85">
        Festival ini dilaksanan setiap hari dengan dua sesi pertunjukkan: pukul
        18:00-19:00 dan pukul 19:00-20:00 WITA.<br />Lokasi paling populernya di
        Pura Uluwatu.
      </div>
      <div class="festival-musik-etnik-C61RwL" data-id="905:106">
         festival musik etnik, modern, dan kontemporer, sebagai bagian dari
        perayaan ulang tahun kota dan upaya mempromosikan Sawahlunto sebagai
        kota warisan dunia.
      </div>
      <div class="festival-ini-dilaksa-VMr6Om" data-id="905:107">
        Festival ini dilaksanakan pada tanggal 10-11 Oktober 2025, yang
        bertempat di Kota Sawahlunto, Sumatera Barat
      </div>
      <div class="full-stop-C61RwL" data-id="905:146"></div>
      <div class="full-stop-VMr6Om" data-id="942:366"></div>
      <div class="festival-seni-rupa-k-C61RwL" data-id="909:152">
         festival seni rupa kontemporer tahunan internasional yang berfungsi
        sebagai pameran seni, ruang berbagi pengetahuan dan estetika, serta
        ajang untuk mempertemukan seniman, publik, dan berbagai pemangku
        kebijakan.
      </div>
      <div class="budaya-C61RwL" data-id="900:232">BUDAYA</div>
      <div class="populer-C61RwL" data-id="905:91">POPULER</div>
      <div class="seni-C61RwL" data-id="900:235">SENI</div>
      <div class="line-49-C61RwL" data-id="905:89"></div>
      <div class="line-49-VMr6Om" data-id="905:90"></div>
      <div class="full-stop-mzXdH9" data-id="905:98"></div>
      <div class="full-stop-QxM5SU" data-id="905:113"></div>
      <div class="rectangle-136-C61RwL" data-id="917:154"></div>
      <div class="rectangle-139-C61RwL" data-id="918:158"></div>
      <div class="rectangle-137-C61RwL" data-id="917:155"></div>
      <div class="rectangle-138-C61RwL" data-id="918:156"></div>
      <div class="line-52-C61RwL" data-id="990:52"></div>
      <div class="event-tari-kecak-C61RwL" data-id="1177:1689">
        Event Tari Kecak
      </div>
      <div
        class="sawahlunto-international-music-festival-C61RwL"
        data-id="1223:1053"
      >
        Sawahlunto International Music Festival
      </div>
      <div class="art-jog-C61RwL" data-id="1226:1055">Art Jog</div>
      <div class="festival-ini-dilaksa-mzXdH9" data-id="1229:1053">
        Festival ini dilaksanakan pada tanggal 10-11 Oktober 2025, yang
        bertempat di Kota Sawahlunto, Sumatera Barat
      </div>
      <div class="full-stop-2P4qUJ" data-id="1229:1055"></div>
      <div class="text-C61RwL" data-id="1311:1356"></div>
      <div class="frame-92-C61RwL" data-id="1329:1562"></div>
      <div class="navbar-utama-C61RwL" data-id="895:250">
        <div class="rectangle-1-V2A9qo" data-id="I895:250;751:30"></div>
        <div
          class="group-81-V2A9qo"
          onclick="Lib.autoanim_redirect('%2A,masuk,,,', event)"
          onmouseover=""
          data-id="I895:250;981:498"
        >
          <div class="rectangle-144-jxZFRv" data-id="I895:250;978:43"></div>
          <div class="masuk-jxZFRv" data-id="I895:250;978:44">Masuk</div>
        </div>
        <div
          class="group-82-V2A9qo"
          onclick="Lib.autoanim_redirect('%2A,daftar,,,', event)"
          onmouseover=""
          data-id="I895:250;981:523"
        >
          <div class="rectangle-145-plqy7w" data-id="I895:250;978:45"></div>
          <div class="daftar-plqy7w" data-id="I895:250;978:49">Daftar</div>
        </div>
        <div
          class="logo-V2A9qo"
          onclick="Lib.autoanim_redirect('%2A,landing-page%23landing-page,,,', event)"
          onmouseover=""
          data-id="I895:250;1180:1748"
        >
          <div class="container-f2fp1k" data-id="I895:250;1180:1749">
            <div class="svg-3WEV9o" data-id="I895:250;1180:1750">
              <div class="vector-wDltJv" data-id="I895:250;1180:1751"></div>
            </div>
          </div>
          <div class="heading-1-f2fp1k" data-id="I895:250;1180:1752">
            <div class="even-tura-lOLSDg" data-id="I895:250;1180:1753">
              EvenTura
            </div>
          </div>
        </div>
        <div class="frame-2-V2A9qo" data-id="I895:250;1051:789">
          <div class="frame-93-zR1zn9" data-id="I895:250;1338:3481">
            <div
              class="beranda-4s0eCj"
              onclick="Lib.autoanim_redirect('%2A,landing-page%23landing-page,,ease-in,1022.0937728881836', event)"
              onmouseover=""
              data-id="I895:250;822:40"
            >
              Beranda
            </div>
          </div>
          <div class="frame-94-zR1zn9" data-id="I895:250;1338:3482">
            <div
              class="event-2a25hI"
              onclick="Lib.autoanim_redirect('%2A,landing-page%23jelajah-event-u40semuau41,,ease-in,1022.0937728881836', event)"
              onmouseover=""
              data-id="I895:250;751:33"
            >
              Event
            </div>
          </div>
          <div class="frame-95-zR1zn9" data-id="I895:250;1338:3483">
            <div
              class="tentang-kami-MiM0oB"
              onclick="Lib.autoanim_redirect('%2A,landing-page%23tentang-kami,,ease-in,1022.0937728881836', event)"
              onmouseover=""
              data-id="I895:250;813:23"
            >
              Tentang Kami
            </div>
          </div>
        </div>
      </div>
      <div class="line-54-C61RwL" data-id="1414:1318"></div>
      <div class="line-55-C61RwL" data-id="1414:1319"></div>
      <div class="line-57-C61RwL" data-id="1414:1323"></div>
      <div class="depth-0-frame-0-C61RwL" data-id="1116:1386">
        <div class="depth-1-frame-0-24uJBH" data-id="1116:1387">
          <div class="depth-2-frame-1-wxw5Hm" data-id="1116:1424">
            <div class="depth-3-frame-0-S0Ej4g" data-id="1116:1425">
              <div class="depth-4-frame-0-50AXrx" data-id="1116:1426">
                <div class="depth-5-frame-0-5gChaF" data-id="1116:1427">
                  <div
                    class="depth-6-frame-0-3GfCWI"
                    data-id="1116:1428-5f60215a-7103-4720-8034-d9f69611d31b"
                  >
                    <div class="depth-7-frame-0-L4I5xE" data-id="1116:1429">
                      <div class="depth-8-frame-0-Y6Hz6v" data-id="1116:1430">
                        <div class="our-story-HTV8UH" data-id="1116:1431">
                          Our Story
                        </div>
                      </div>
                    </div>
                    <div class="tentang-kami-L4I5xE" data-id="1258:1174">
                      Tentang Kami
                    </div>
                  </div>
                </div>
              </div>
              <div class="depth-4-frame-1-50AXrx" data-id="1116:1432">
                <div class="even-tura-website-in-h5ZuSM" data-id="1116:1433">
                  EvenTura, website ini dibuat untuk mampu menjadi jembatan
                  antara masyarakat dan wisatawan dalam event daerah Indonesia.
                  Masyarakat serta wisatawan dapat dengan mudah mengakses
                  informasi mengenai budaya di Indonesia dan dapat mengakses
                  jadwal event budaya tersebut melalui platform ini.<br /><br /> Website
                  ini bertujuan untuk memberikan pengguna informasi yang detail
                  dan lengkap mengenai berbagai event di setiap daerah di
                  Indonesia, seperti budaya, pertunjukan seni tari, teater, dan
                  musik. Memberikan kemudahan bagi masyarakat dan wisatawan
                  untuk menemukan dan mengikuti event-event yang ada di
                  Nusantara sesuai lokasi yang diinginkan oleh masyarakat
                  ataupun wisatawan untuk berkunjung. Selain itu, website ini
                  bertujuan untuk memberikan pemahaman bagi masyarakat dan
                  wisatawan terhadap keberagaman event yang ada di Nusantara.
                </div>
              </div>
              <div class="depth-4-frame-2-50AXrx" data-id="1116:1434">
                <div class="filosofi-kami-wBqEnk" data-id="1116:1435">
                  Filosofi Kami
                </div>
              </div>
              <div class="depth-4-frame-3-50AXrx" data-id="1116:1436">
                <div class="indonesia-dikenal-se-xc76oh" data-id="1116:1437">
                  Indonesia dikenal sebagai negara yang kaya akan keberagaman
                  budaya dari setiap suku bangsa dan tradisi yang tersebar di
                  setiap tempat. Setiap daerah pastinya memiliki event daerahnya
                  masing-masing. Sayangnya, di era sekarang informasi mengenai
                  event event daerah tersebut mulai terpinggirkan dan kurang
                  dikenal oleh generasi muda saat ini.<br /><br />Platform ini
                  dibuat untuk mampu menjadi jembatan antara masyarakat dan
                  wisatawan dalam event budaya Indonesia. Masyarakat serta
                  wisatawan dapat dengan mudah mengakses informasi mengenai
                  event daerah di Indonesia dan dapat mengakses jadwal event
                  daerah tersebut melalui platform ini.
                </div>
              </div>
              <div class="depth-4-frame-8-50AXrx" data-id="1116:1510">
                <div class="proses-kami-qzc6i9" data-id="1116:1511">
                  Proses Kami
                </div>
              </div>
              <div class="depth-4-frame-9-50AXrx" data-id="1116:1512">
                <div class="depth-5-frame-0-CNqNuv" data-id="1116:1513">
                  <div class="depth-6-frame-0-r1tV8V" data-id="1116:1514"></div>
                  <div class="depth-6-frame-1-r1tV8V" data-id="1116:1520">
                    <div class="depth-7-frame-0-BtUOBa" data-id="1116:1521">
                      <div
                        class="pencarian-referensi-xuCOFE"
                        data-id="1116:1522"
                      >
                        Pencarian Referensi
                      </div>
                    </div>
                    <div class="depth-7-frame-1-BtUOBa" data-id="1116:1523">
                      <div
                        class="kami-mencari-referen-uOvDzt"
                        data-id="1116:1524"
                      >
                        Kami mencari referensi pada website website, diantaranya
                        yaitu Dribbble, Pinterest, dan dari teman-teman.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="depth-5-frame-1-CNqNuv" data-id="1116:1525">
                  <div class="depth-6-frame-0-aJFGSU" data-id="1116:1526"></div>
                  <div class="depth-6-frame-1-aJFGSU" data-id="1116:1533">
                    <div class="depth-7-frame-0-CPwib3" data-id="1116:1534">
                      <div
                        class="perencanaan-desain-sLRA68"
                        data-id="1116:1535"
                      >
                        Perencanaan Desain
                      </div>
                    </div>
                    <div class="depth-7-frame-1-CPwib3" data-id="1116:1536">
                      <div
                        class="dari-referensi-yang-5doCf2"
                        data-id="1116:1537"
                      >
                        Dari referensi yang telah saya dapatkan saya mulai
                        merencanakan mockup yang akan saya pakai untuk website
                        ini.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="depth-5-frame-2-CNqNuv" data-id="1116:1538">
                  <div class="depth-6-frame-0-okandW" data-id="1116:1539"></div>
                  <div class="depth-6-frame-1-okandW" data-id="1116:1546">
                    <div class="depth-7-frame-0-bTotwY" data-id="1116:1547">
                      <div
                        class="pelaksanaan-pengerjaan-SMA1i6"
                        data-id="1116:1548"
                      >
                        Pelaksanaan Pengerjaan
                      </div>
                    </div>
                    <div class="depth-7-frame-1-bTotwY" data-id="1116:1549">
                      <div
                        class="kami-mulai-mengerjak-tA1wyt"
                        data-id="1116:1550"
                      >
                        Kami mulai mengerjakan mockup website ini setelah
                        perencanaan mockup website yang telah matang
                      </div>
                    </div>
                  </div>
                </div>
                <div class="depth-5-frame-3-CNqNuv" data-id="1116:1551">
                  <div class="depth-6-frame-0-nuiyxx" data-id="1116:1552"></div>
                  <div class="depth-6-frame-1-nuiyxx" data-id="1116:1558">
                    <div class="depth-7-frame-0-oxDn3Q" data-id="1116:1559">
                      <div
                        class="penyelesaian-desain-secara-penuh-HqQc8E"
                        data-id="1116:1560"
                      >
                        Penyelesaian Desain Secara Penuh
                      </div>
                    </div>
                    <div class="depth-7-frame-1-oxDn3Q" data-id="1116:1561">
                      <div
                        class="kami-mengerjakan-pen-ELtSYk"
                        data-id="1116:1562"
                      >
                        Kami mengerjakan&nbsp;&nbsp;penuh mockup web ini setelah
                        adanya pembetulan pembetulan dari mockup sebelumnya
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-utama-wxw5Hm" data-id="1182:22134">
            <div class="frame-logo-hShA4c" data-id="I1182:22134;1182:4685">
              <div class="logo-VmE75h" data-id="I1182:22134;1180:3688">
                <div class="container-xi6PTE" data-id="I1182:22134;1180:3689">
                  <div class="svg-EJ6hBp" data-id="I1182:22134;1180:3690">
                    <div
                      class="vector-YDK1t0"
                      data-id="I1182:22134;1180:3691"
                    ></div>
                  </div>
                </div>
                <div class="heading-1-xi6PTE" data-id="I1182:22134;1180:3692">
                  <div class="even-tura-dSRByr" data-id="I1182:22134;1180:3693">
                    EvenTura
                  </div>
                </div>
              </div>
              <div
                class="website-yang-berfung-VmE75h"
                data-id="I1182:22134;1028:167"
              >
                Website yang berfungsi untuk memberikan kemudahan bagi
                masyarakat dan wisatawan dalam menemukan event event pada setiap
                daerah di Nusantara. Selain itu website ini berfungsi untuk
                memberikan pemahaman terhadap keberagaman event di Nusantara
              </div>
            </div>
            <div class="nav-hShA4c" data-id="I1182:22134;1028:123">
              <div class="container-QQ1GGB" data-id="I1182:22134;1028:124">
                <div class="link-7blFLR" data-id="I1182:22134;1182:9696">
                  <div class="navigasi-sE7Rrr" data-id="I1182:22134;1182:9697">
                    Navigasi
                  </div>
                </div>
                <div class="link-WtBLwh" data-id="I1182:22134;1028:130">
                  <div class="beranda-pZKUT4" data-id="I1182:22134;1028:131">
                    Beranda
                  </div>
                </div>
                <div class="link-HMOx67" data-id="I1182:22134;1182:15829">
                  <div class="event-kcIvlu" data-id="I1182:22134;1182:15830">
                    Event
                  </div>
                </div>
                <div class="link-Stuv4p" data-id="I1182:22134;1028:128">
                  <div class="tentang-HuB73o" data-id="I1182:22134;1028:129">
                    Tentang
                  </div>
                </div>
              </div>
              <div class="container-sNFGxt" data-id="I1182:22134;1028:136">
                <div
                  class="heading-3margin-umkU3T"
                  data-id="I1182:22134;1028:137"
                >
                  <div class="heading-3-Nimsnl" data-id="I1182:22134;1028:138">
                    <div class="contact-wQB2ia" data-id="I1182:22134;1028:139">
                      Contact
                    </div>
                  </div>
                </div>
                <div class="container-umkU3T" data-id="I1182:22134;1028:140">
                  <div class="link-fvfErp" data-id="I1182:22134;1028:141">
                    <div class="svg-IJlLKH" data-id="I1182:22134;1028:142">
                      <div
                        class="vector-xrDnxO"
                        data-id="I1182:22134;1028:143"
                      ></div>
                    </div>
                    <div
                      class="container-IJlLKH"
                      data-id="I1182:22134;1028:144"
                    >
                      <div
                        class="x1-234-567-890-XZTdmt"
                        data-id="I1182:22134;1028:145"
                      >
                        +1 (234) 567-890
                      </div>
                    </div>
                  </div>
                  <div class="link-TD9rvn" data-id="I1182:22134;1028:146">
                    <div class="svg-xixMnH" data-id="I1182:22134;1028:147">
                      <div
                        class="vector-ipnCLz"
                        data-id="I1182:22134;1028:148"
                      ></div>
                      <div
                        class="vector-836UyJ"
                        data-id="I1182:22134;1028:149"
                      ></div>
                    </div>
                    <div
                      class="container-xixMnH"
                      data-id="I1182:22134;1028:150"
                    >
                      <div
                        class="contactislandeventscom-24wwI1"
                        data-id="I1182:22134;1028:151"
                      >
                        contact@islandevents.com
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="frame-bawah-hShA4c" data-id="I1182:22134;1028:152">
              <div
                class="horizontal-border-xlKVyc"
                data-id="I1182:22134;1028:153"
              >
                <div
                  class="container-8Rlgia"
                  data-id="I1182:22134;1028:154"
                ></div>
                <div class="container-hlFe0W" data-id="I1182:22134;1028:164">
                  <div
                    class="x2024-island-events-all-rights-reserved-zUxKHz"
                    data-id="I1182:22134;1028:165"
                  >
                    © 2024 Island Events. All rights reserved.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="frame-90-C61RwL" data-id="1237:2385">
        <div class="ulasan-vo1VF3" data-id="1237:2215">Ulasan</div>
        <div class="rectangle-152-vo1VF3" data-id="1239:2904">
          <div class="rectangle-152-RL1LtC" data-id="I1239:2904;1008:75"></div>
          <div class="supri-RL1LtC" data-id="I1239:2904;1009:77">Naufal</div>
          <div class="x7-agustus-2021-RL1LtC" data-id="I1239:2904;1009:80">
            7 Agustus 2021
          </div>
          <div class="lorem-ipsum-dolor-si-RL1LtC" data-id="I1239:2904;1009:84">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis aute irure dolor in
            reprehenderit
          </div>
          <div class="frame-91-RL1LtC" data-id="I1239:2904;1239:2405"></div>
          <div class="rectangle-153-RL1LtC" data-id="I1239:2904;1023:118"></div>
        </div>
        <div class="rectangle-152-mAHt2K" data-id="1239:2921">
          <div class="rectangle-152-KxqkxL" data-id="I1239:2921;1008:75"></div>
          <div class="supri-KxqkxL" data-id="I1239:2921;1009:77">Nar</div>
          <div class="x7-agustus-2021-KxqkxL" data-id="I1239:2921;1009:80">
            7 Agustus 2021
          </div>
          <div class="lorem-ipsum-dolor-si-KxqkxL" data-id="I1239:2921;1009:84">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis aute irure dolor in
            reprehenderit
          </div>
          <div class="frame-91-KxqkxL" data-id="I1239:2921;1239:2405"></div>
          <div class="rectangle-153-KxqkxL" data-id="I1239:2921;1023:118"></div>
        </div>
        <div class="rectangle-152-KGxbYv" data-id="1239:2938">
          <div class="rectangle-152-VxT6qF" data-id="I1239:2938;1008:75"></div>
          <div class="supri-VxT6qF" data-id="I1239:2938;1009:77">Zidan</div>
          <div class="x7-agustus-2021-VxT6qF" data-id="I1239:2938;1009:80">
            7 Agustus 2021
          </div>
          <div class="lorem-ipsum-dolor-si-VxT6qF" data-id="I1239:2938;1009:84">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis aute irure dolor in
            reprehenderit
          </div>
          <div class="frame-91-VxT6qF" data-id="I1239:2938;1239:2405"></div>
          <div class="rectangle-153-VxT6qF" data-id="I1239:2938;1023:118"></div>
        </div>
      </div>
      <div class="frame-88-C61RwL" data-id="1237:2383">
        <div class="background-FKNjej" data-id="1237:2238">
          <div class="margin-l2A9z7" data-id="1237:2239">
            <div class="container-PlKXFX" data-id="1237:2240">
              <div class="icon-GSamDi" data-id="1237:2241">
                <div class="vector-LZ4XhX" data-id="1237:2242"></div>
              </div>
            </div>
          </div>
          <div class="container-l2A9z7" data-id="1237:2243">
            <div class="heading-3-s0JyA5" data-id="1237:2244">
              <div class="tanggal-waktu-xz3p6n" data-id="1237:2245">
                Tanggal &amp; Waktu
              </div>
            </div>
            <div class="container-s0JyA5" data-id="1237:2246">
              <div class="setiap-hari-lWKEuf" data-id="1237:2247">
                Setiap Hari
              </div>
            </div>
            <div class="container-m0yVWU" data-id="1237:2248">
              <div class="x1800-wita-1900-wita-ugAevv" data-id="1237:2249">
                18:00-19:00&nbsp;&nbsp;WITA<br />19:00-20:00 WITA
              </div>
            </div>
          </div>
        </div>
        <div class="background-hP63OY" data-id="1237:2250">
          <div class="margin-ZGgE2v" data-id="1237:2251">
            <div class="container-5y9hVj" data-id="1237:2252">
              <div class="icon-XsTWhD" data-id="1237:2253">
                <div class="vector-b6rxVz" data-id="1237:2254"></div>
              </div>
            </div>
          </div>
          <div class="container-ZGgE2v" data-id="1237:2255">
            <div class="heading-3-xuLxxx" data-id="1237:2256">
              <div class="lokasi-rmTTen" data-id="1237:2257">Lokasi</div>
            </div>
            <div class="container-xuLxxx" data-id="1237:2258">
              <div
                class="pura-uluwatu-pantai-melasti-zOgrWp"
                data-id="1237:2259"
              >
                Pura Uluwatu, Pantai Melasti
              </div>
            </div>
            <div class="container-NJvg78" data-id="1237:2260">
              <div class="bali-indonesia-7yNalo" data-id="1237:2261">
                Bali, Indonesia
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="frame-87-C61RwL" data-id="1237:2382">
        <div class="tari-kecak-V6dEk7" data-id="1237:2214">Tari Kecak</div>
        <div class="tari-kecak-adalah-pe-V6dEk7" data-id="1237:2224">
          Tari Kecak adalah pertunjukan drama tari khas Bali yang mengangkat
          kisah Ramayana. Tarian ini ditarikan oleh puluhan penari laki-laki
          yang duduk secara melingkar. Mereka menyerukan &#34;cak cak cak&#34;
          sambil mengangkat kedua lengan. Pada satu segmen, mereka menirukan
          adegan saat barisan kera membantu Rama dalam pertempuran melawan
          Rahwana yang menculik Dewi Sita.
        </div>
      </div>
      <div class="frame-89-C61RwL" data-id="1238:2387">
        <div class="line-53-BXRxMX" data-id="1237:2225"></div>
      </div>
      <div class="frame-89-VMr6Om" data-id="1237:2384">
        <div class="container-vs79GK" data-id="1237:2226">
          <div
            class="link-aSQ0DE"
            onclick="Lib.autoanim_redirect('%2A,landing-page%23jelajah-event-u40semuau41,,,', event)"
            onmouseover=""
            data-id="1237:2227"
          >
            <div class="event-YOtCts" data-id="1237:2228">Event</div>
          </div>
          <div class="margin-aSQ0DE" data-id="1237:2229">
            <div class="container-KSdUXU" data-id="1237:2230">
              <div class="icon-WODoIr" data-id="1237:2231">
                <div class="vector-9Orhxb" data-id="1237:2232"></div>
              </div>
            </div>
          </div>
          <div class="margin-cM5vAy" data-id="1237:2233">
            <div class="tari-kecak-Oy8Qap" data-id="1237:2234">Tari Kecak</div>
          </div>
        </div>
        <div class="frame-86-vs79GK" data-id="1237:2381">
          <div class="rectangle-151-zCeYVr" data-id="1237:2211"></div>
          <div class="rectangle-151-HbpjXC" data-id="1237:2213"></div>
          <div class="rectangle-151-fQXu42" data-id="1237:2212"></div>
          <div class="weuilike-outlined-zCeYVr" data-id="1372:1434"></div>
        </div>
      </div>
      <div class="link-C61RwL" data-id="1255:1223">
        <div class="container-7t8sXf" data-id="1255:1224">
          <div class="icon-T5KnqE" data-id="1255:1225">
            <div class="vector-bi0ei7" data-id="1255:1226"></div>
          </div>
        </div>
        <div class="container-HqL6vM" data-id="1255:1227">
          <div class="logout-ps2wI5" data-id="1255:1228">Logout</div>
        </div>
      </div>
    </div>
    <script src="launchpad-js/launchpad-banner.js" async></script>
    <script
      defer
      src="https://animaapp.s3.amazonaws.com/static/restart-btn.min.js"
    ></script>
  </body>
</html>
