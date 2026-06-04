<!DOCTYPE html>

<!-- This code was generated using AnimaApp.com. 
This code is a high-fidelity prototype.
Get developer-friendly React or HTML/CSS code for this project at: https://projects.animaapp.com?utm_source=hosted-code 
07/11/2025 05:16:08 -->

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

      @import url("https://fonts.googleapis.com/css?family=Inter:400,200italic,200,600,300,800,500,700|Montserrat:400italic,700,600,800,500,400|Material+Icons:400|Poppins:400|Plus+Jakarta+Sans:500,700,400");

      /* The following line is used to measure usage of this code. You can remove it if you want. */
      @import url("https://px.animaapp.com/6905a639a265c7a763e28600.6905a63aa265c7a763e28603.8LV0a7G.hch.png");

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
      /* screen - masuk */

      .masuk {
        background-color: var(--white);
        margin: 0px;
        min-height: 1024px;
        min-width: 1440px;
        overflow: hidden;
        overflow-x: hidden;
        position: relative;
        width: 100%;
      }

      .masuk .daftar-CX7m3G {
        background-color: transparent;
        height: auto;
        left: 27px;
        letter-spacing: 0px;
        line-height: normal;
        position: absolute;
        text-align: left;
        top: calc(50% - 10px);
        width: 68px;
      }

      .masuk .masuk-C61RwL {
        left: 527px;
        top: 53px;
        width: 68px;
      }

      .masuk .group-85-C61RwL {
        background-color: transparent;
        cursor: pointer;
        height: 60px;
        left: 899px;
        position: absolute;
        top: 566px;
        width: 402px;
      }

      .masuk .rectangle-148-rFX9Nh {
        background-color: #b31919;
        border-radius: 30px;
        height: 60px;
        left: 0px;
        position: absolute;
        top: 0px;
        width: 400px;
      }

      .masuk .masuk-rFX9Nh {
        color: var(--white);
        font-family: var(--font-family-montserrat);
        font-size: var(--font-size-l);
        font-style: normal;
        font-weight: 700;
        left: calc(50% - 43px);
        top: calc(50% - 15px);
        width: auto;
      }

      .masuk .title-C61RwL {
        background-color: transparent;
        color: var(--black);
        font-family: var(--font-family-inter);
        font-size: var(--font-size-xl);
        font-style: normal;
        font-weight: 700;
        height: auto;
        left: 987px;
        letter-spacing: 0px;
        line-height: normal;
        position: absolute;
        text-align: center;
        top: 170px;
        width: auto;
      }

      .masuk .vector-AQvbqT {
        height: 40.53%;
        left: 5.56%;
        top: 59.47%;
        width: 79.08%;
      }

      .masuk .tidak-memiliki-akun-daftar-C61RwL {
        background-color: transparent;
        color: transparent;
        cursor: pointer;
        font-family: var(--font-family-montserrat);
        font-size: var(--font-size-s);
        font-style: normal;
        font-weight: 400;
        height: auto;
        left: 992px;
        letter-spacing: 0px;
        line-height: normal;
        position: absolute;
        text-align: center;
        top: 642px;
        white-space: nowrap;
        width: auto;
      }

      .masuk .span0-GT1s8T {
        color: var(--black);
        font-style: normal;
      }

      .masuk .span1-GT1s8T {
        color: var(--black);
        font-style: normal;
        font-weight: 500;
      }

      .masuk .span2-GT1s8T {
        color: #00d6c4;
        font-style: italic;
      }

      .masuk .masuk-1 {
        background-color: transparent;
        height: auto;
        letter-spacing: 0px;
        line-height: normal;
        position: absolute;
        text-align: left;
      }

      html,
      body {
        max-width: 100%;
        overflow-x: hidden;
      }

      .masuk,
      .masuk * {
        max-width: 100vw;
      }
    </style>
  </head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  </head>
  <body style="margin: 0; background: #ffffff">
    <input type="hidden" id="anPageName" name="page" value="masuk" />
    <div class="masuk screen" data-id="1175:1640">
      <img
        class="rectangle-142-C61RwL"
        data-id="1175:1641"
        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
        anima-src="https://cdn.animaapp.com/projects/6905a63ba265c7a763e28605/releases/690d8095ba5659c7fb65f3ad/img/rectangle-142.png"
        alt="Rectangle 142"
      />
      <div class="group-80-C61RwL" data-id="1175:1642">
        <div class="daftar-CX7m3G inter-medium-black-16px" data-id="1175:1643">
          Daftar
        </div>
        <div class="rectangle-143-CX7m3G" data-id="1175:1644"></div>
      </div>
      <div
        class="masuk-C61RwL masuk-1 inter-medium-black-16px"
        data-id="1175:1645"
      >
        Masuk
      </div>
      <a href="landing-page#landing-page" data-turbolinks="false"
        ><div class="group-85-C61RwL" data-id="1175:1646">
          <div class="rectangle-148-rFX9Nh" data-id="1175:1647"></div>
          <div class="masuk-rFX9Nh masuk-1" data-id="1175:1648">Masuk</div>
        </div></a
      >
      <h1 class="title-C61RwL" data-id="1175:1649">Masuk</h1>
      <div class="atau-C61RwL atau" data-id="1175:1650">
        <div class="atau-nalc9N atau" data-id="1175:1651">atau</div>
        <img
          class="line-50-nalc9N"
          data-id="1175:1652"
          src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
          anima-src="https://cdn.animaapp.com/projects/6905a63ba265c7a763e28605/releases/690d8095ba5659c7fb65f3ad/img/line-50.svg"
          alt="Line 50"
        /><img
          class="line-51-nalc9N"
          data-id="1175:1653"
          src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
          anima-src="https://cdn.animaapp.com/projects/6905a63ba265c7a763e28605/releases/690d8095ba5659c7fb65f3ad/img/line-51.svg"
          alt="Line 51"
        />
      </div>
      <div class="email-C61RwL email" data-id="1175:1654">
        <div
          class="email-AJcDBt email inter-extra-light-black-16px"
          data-id="1175:1655"
        >
          email
        </div>
        <div class="rectangle-145-AJcDBt" data-id="1175:1656"></div>
        <img
          class="email-PICrXu email"
          data-id="1175:1657"
          src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
          anima-src="https://cdn.animaapp.com/projects/6905a63ba265c7a763e28605/releases/690d8095ba5659c7fb65f3ad/img/email@2x.png"
          alt="Email"
        />
      </div>
      <div class="password-C61RwL password" data-id="1175:1658">
        <div
          class="kata-sandi-RPdzxH inter-extra-light-black-16px"
          data-id="1175:1659"
        >
          kata sandi
        </div>
        <div class="rectangle-147-RPdzxH" data-id="1175:1660"></div>
        <img
          class="password-RPdzxH password"
          data-id="1175:1661"
          src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
          anima-src="https://cdn.animaapp.com/projects/6905a63ba265c7a763e28605/releases/690d8095ba5659c7fb65f3ad/img/password@2x.png"
          alt="Password"
        />
      </div>
      <div class="username-C61RwL" data-id="1175:1662">
        <div
          class="nama-pengguna-webtXY inter-extra-light-black-16px"
          data-id="1175:1663"
        >
          nama pengguna
        </div>
        <div class="rectangle-146-webtXY" data-id="1175:1664"></div>
        <img
          class="user-webtXY"
          data-id="1175:1665"
          src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
          anima-src="https://cdn.animaapp.com/projects/6905a63ba265c7a763e28605/releases/690d8095ba5659c7fb65f3ad/img/user@2x.png"
          alt="User"
        />
      </div>
      <img
        class="frame-83-C61RwL"
        data-id="1175:1666"
        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
        anima-src="https://cdn.animaapp.com/projects/6905a63ba265c7a763e28605/releases/690d8095ba5659c7fb65f3ad/img/frame-83-1.svg"
        alt="Frame 83"
      />
      <div class="google-C61RwL" data-id="1175:1680">
        <div class="daftar-dengan-google-hBaSeu" data-id="1175:1681">
          Daftar dengan google
        </div>
        <div class="rectangle-149-hBaSeu" data-id="1175:1682"></div>
        <div class="group-hBaSeu" data-id="1175:1683">
          <img
            class="vector-vyxFrR vector"
            data-id="1175:1684"
            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
            anima-src="https://cdn.animaapp.com/projects/6905a63ba265c7a763e28605/releases/690d8095ba5659c7fb65f3ad/img/vector-10.svg"
            alt="Vector"
          /><img
            class="vector-oBUzgS vector"
            data-id="1175:1685"
            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
            anima-src="https://cdn.animaapp.com/projects/6905a63ba265c7a763e28605/releases/690d8095ba5659c7fb65f3ad/img/vector-11.svg"
            alt="Vector"
          /><img
            class="vector-2XVQOZ vector"
            data-id="1175:1686"
            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
            anima-src="https://cdn.animaapp.com/projects/6905a63ba265c7a763e28605/releases/690d8095ba5659c7fb65f3ad/img/vector-12.svg"
            alt="Vector"
          /><img
            class="vector-AQvbqT vector"
            data-id="1175:1687"
            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
            anima-src="https://cdn.animaapp.com/projects/6905a63ba265c7a763e28605/releases/690d8095ba5659c7fb65f3ad/img/vector-13.svg"
            alt="Vector"
          />
        </div>
      </div>
      <a href="daftar"
        ><div class="tidak-memiliki-akun-daftar-C61RwL" data-id="1441:1271">
          <span class="span0-GT1s8T">Tidak memiliki akun?</span
          ><span class="span1-GT1s8T">&nbsp;</span
          ><span class="span2-GT1s8T">Daftar</span>
        </div></a
      >
    </div>
    <script src="launchpad-js/launchpad-banner.js" async></script>
    <script
      defer
      src="https://animaapp.s3.amazonaws.com/static/restart-btn.min.js"
    ></script>
  </body>
</html>
