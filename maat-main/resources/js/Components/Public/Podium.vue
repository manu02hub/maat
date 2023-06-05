<scrip>
</scrip>

<template>
    <html>

    <body class="page-leaderboard">
        <section class="ranking">
            <div class="contain">
                <div class="ranking-table">
                    <div class="ranking-table-header-row">
                        <div class="ranking-table-header-data h6">
                            Rank
                        </div>
                        <div class="ranking-table-header-data h6">
                            Name
                        </div>
                        <div class="ranking-table-header-data h6">
                            Progress
                        </div>
                    </div>
                    <div v-for="users, i in $page.props.user">
                        <!-- puesto 1 -->
                        <div v-if="i === 0" class="ranking-table-row-leader-1">
                            <div class="ranking-table-data-leader-1">
                                <div class="medal-gold"></div>
                            </div>
                            <div class="ranking-table-data">{{ users.nombre }}</div>
                            <div class="ranking-table-data">
                                <div class="complete"></div>
                            </div>
                        </div>
                        <!-- Puesto 2 -->
                        <div v-else-if="i === 1" class="ranking-table-row-leader-2">
                            <div class="ranking-table-data-leader-2">
                                <div class="medal-silver"></div>
                            </div>
                            <div class="ranking-table-data">{{ users.nombre }}</div>
                            <div class="ranking-table-data">
                                <div class="complete"></div>
                            </div>
                        </div>
                        <!-- Puesto 3 -->
                        <div v-else-if="i === 2" class="ranking-table-row-leader-3">
                            <div class="ranking-table-data-leader-3">
                                <div class="medal-bronze"></div>
                            </div>
                            <div class="ranking-table-data">{{ users.nombre }}</div>
                            <div class="ranking-table-data">
                                <div class="complete"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Puesto 4 -->
                    <div class="ranking-table-body">
                        <div v-for="userss, i in $page.props.user" class="ranking-table-row"
                            v-if="i != 0 && i != 1 && i != 2">
                            <div class="ranking-table-data">{{ i + 4 }}</div>
                            <div class="ranking-table-data">
                                {{ userss.nombre }}
                            </div>
                            <div class="ranking-table-data">
                                <div class="complete"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Use Date Formatter-->
            </div>
        </section>
        <footer class="footer">
            <div class="contain contain--small">
                <section class="footer__logo"></section>
                <div id="chat">
                    <div style="display: none">
                        <a href="#" onclick="return hideChatWindow(event)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 8 8">
                                <path
                                    d="M1.41 0l-1.41 1.41.72.72 1.78 1.81-1.78 1.78-.72.69 1.41 1.44.72-.72 1.81-1.81 1.78 1.81.69.72 1.44-1.44-.72-.69-1.81-1.78 1.81-1.81.72-.72-1.44-1.41-.69.72-1.78 1.78-1.81-1.78-.72-.72z">
                                </path>
                            </svg>
                        </a>
                        <app>
                            <div id="rupertChatWrapper">
                                <div id="chatview" data-is="chat-view"></div>
                            </div>
                        </app>
                    </div>

                    <svg id="icon-chat-bubble-call-to-action" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 231 60">

                    </svg>
                </div>
            </div>
        </footer>
    </body>

    </html>
</template>

<style>
.page-leaderboard .ranking .ranking-table-body {
    box-shadow: 0 0 0.75em 0 rgba(46, 60, 73, 0.12);
    border-radius: 0.375rem;
    border: solid 0.063em #dbe2e8;
    max-height: 24.625em;
    overflow: scroll;
    -webkit-overflow-scrolling: touch;
}

@media (min-width: 33em) {
    .page-leaderboard .ranking .ranking-table-body {
        max-height: 31.125em;
    }
}

.page-leaderboard .ranking .ranking-table-header-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    padding-top: 1.125em;
}

@media (min-width: 33em) {
    .page-leaderboard .ranking .ranking-table-header-row {
        padding-top: 1.875em;
    }
}

.page-leaderboard .ranking .ranking-table-header-data {
    text-align: center;
    align-self: center;
}

.page-leaderboard .ranking .ranking-table-header-data:first-child {
    width: 20%;
}

@media (min-width: 48em) {
    .page-leaderboard .ranking .ranking-table-header-data:first-child {
        width: 15%;
    }
}

.page-leaderboard .ranking .ranking-table-header-data:nth-child(2) {
    padding-left: 9%;
    text-align: left;
    width: 50%;
}

@media (min-width: 33em) {
    .page-leaderboard .ranking .ranking-table-header-data:nth-child(2) {
        padding-left: 6.3%;
    }
}

@media (min-width: 48em) {
    .page-leaderboard .ranking .ranking-table-header-data:nth-child(2) {
        padding-left: 9%;
        width: 55%;
    }
}

@media (min-width: 70em) {
    .page-leaderboard .ranking .ranking-table-header-data:nth-child(2) {
        padding-left: 4%;
    }
}

.page-leaderboard .ranking .ranking-table-header-data:nth-child(3) {
    width: 30%;
}

@media (min-width: 33em) {
    .page-leaderboard .ranking .ranking-table-header-data:nth-child(3) {
        width: 25%;
    }
}

.page-leaderboard .ranking .ranking-table-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    padding-top: 0.875em;
    padding-bottom: 0.875em;
    background-color: #fff;
}

@media (min-width: 33em) {
    .page-leaderboard .ranking .ranking-table-row {
        padding-top: 1.125em;
        padding-bottom: 1.125em;
    }
}

.page-leaderboard .ranking .ranking-table-row:nth-child(even) {
    background-color: #fafbfc;
}

.page-leaderboard .ranking .ranking-table-row-leader-1,
.page-leaderboard .ranking .ranking-table-row-leader-2,
.page-leaderboard .ranking .ranking-table-row-leader-3 {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    padding-top: 0.875em;
    padding-bottom: 0.875em;
    background-color: #fff;
    box-shadow: 0 0 0.75em 0 rgba(46, 60, 73, 0.12);
    border-radius: 0.375rem;
    margin-bottom: 1.25em;
}

@media (min-width: 33em) {

    .page-leaderboard .ranking .ranking-table-row-leader-1,
    .page-leaderboard .ranking .ranking-table-row-leader-2,
    .page-leaderboard .ranking .ranking-table-row-leader-3 {
        padding-top: 1.125em;
        padding-bottom: 1.125em;
    }
}

.page-leaderboard .ranking .ranking-table-row-leader-1 .ranking-table-data-leader-1,
.page-leaderboard .ranking .ranking-table-row-leader-2 .ranking-table-data-leader-2,
.page-leaderboard .ranking .ranking-table-row-leader-3 .ranking-table-data-leader-3 {
    display: flex;
    justify-content: center;
    width: 20%;
}

@media (min-width: 48em) {

    .page-leaderboard .ranking .ranking-table-row-leader-1 .ranking-table-data-leader-1,
    .page-leaderboard .ranking .ranking-table-row-leader-2 .ranking-table-data-leader-2,
    .page-leaderboard .ranking .ranking-table-row-leader-3 .ranking-table-data-leader-3 {
        width: 15%;
    }
}

.page-leaderboard .ranking .ranking-table-row-leader-1 .ranking-table-data-leader-1 .medal-gold,
.page-leaderboard .ranking .ranking-table-row-leader-2 .ranking-table-data-leader-2 .medal-silver,
.page-leaderboard .ranking .ranking-table-row-leader-3 .ranking-table-data-leader-3 .medal-bronze {
    margin-top: -1.313em;
    height: 2.875em;
    width: 2.875em;
}

@media (min-width: 33em) {

    .page-leaderboard .ranking .ranking-table-row-leader-1 .ranking-table-data-leader-1 .medal-gold,
    .page-leaderboard .ranking .ranking-table-row-leader-2 .ranking-table-data-leader-2 .medal-silver,
    .page-leaderboard .ranking .ranking-table-row-leader-3 .ranking-table-data-leader-3 .medal-bronze {
        margin-top: -1.563em;
        height: 3.875em;
        width: 3.875em;
    }
}

.page-leaderboard .ranking .ranking-table-row-leader-1 {
    border: solid 0.125em #ecc81a;
}

.page-leaderboard .ranking .ranking-table-row-leader-1 .ranking-table-data-leader-1 .medal-gold {
    background: url(https://d125fmws0bore1.cloudfront.net/assets/pages/leaderboard/medal-gold-c49052bfa07f36621f16dbe77f7fc36cbafd72ff088ea970256ff998be05687b.svg) no-repeat;
    background-size: contain;
}

.page-leaderboard .ranking .ranking-table-row-leader-2 {
    border: solid 0.125em #dbe2e8;
}

.page-leaderboard .ranking .ranking-table-row-leader-2 .ranking-table-data-leader-2 .medal-silver {
    background: url(https://d125fmws0bore1.cloudfront.net/assets/pages/leaderboard/medal-silver-d099c5dd916c167c3ba4716c8968a819f317daaef1901c8e8bae6c6932852faa.svg) no-repeat;
    background-size: contain;
}

.page-leaderboard .ranking .ranking-table-row-leader-3 {
    border: solid 0.125em #dfdfd1;
}

.page-leaderboard .ranking .ranking-table-row-leader-3 .ranking-table-data-leader-3 .medal-bronze {
    background: url(https://d125fmws0bore1.cloudfront.net/assets/pages/leaderboard/medal-bronze-d0f15d413800257442c8d4b2d5239cfe28c9fd9594f863ab1fad5258f8d1d5eb.svg) no-repeat;
    background-size: contain;
}

.page-leaderboard .ranking .ranking-table-data {
    align-self: center;
    color: #525c65;
    font-size: 1em;
}

.page-leaderboard .ranking .ranking-table-data:first-child {
    text-align: center;
    width: 20%;
    color: #525c65;
    font-weight: 600;
}

@media (min-width: 33em) {
    .page-leaderboard .ranking .ranking-table-data:first-child {
        font-size: 1.25em;
    }
}

@media (min-width: 48em) {
    .page-leaderboard .ranking .ranking-table-data:first-child {
        width: 15%;
    }
}

.page-leaderboard .ranking .ranking-table-data:nth-child(2) {
    color: #2e3d49;
    width: 55%;
    font-size: 0.875em;
    padding-left: 9%;
}

@media (min-width: 33em) {
    .page-leaderboard .ranking .ranking-table-data:nth-child(2) {
        font-size: 1em;
    }
}

@media (min-width: 48em) {
    .page-leaderboard .ranking .ranking-table-data:nth-child(2) {
        font-size: 1em;
        width: 55%;
    }
}

@media (min-width: 70em) {
    .page-leaderboard .ranking .ranking-table-data:nth-child(2) {
        font-size: 1em;
        padding-left: 4%;
    }
}

.page-leaderboard .ranking .ranking-table-data:nth-child(3) {
    font-size: 0.875em;
    text-align: center;
    width: 25%;
    padding-right: 4%;
}

@media (min-width: 33em) {
    .page-leaderboard .ranking .ranking-table-data:nth-child(3) {
        padding-right: 0%;
        font-size: 1em;
    }
}

.page-leaderboard .ranking .ranking-table-data:nth-child(3) .complete {
    margin: -1.25em auto;
    transform: translateY(18%);
    background: url(https://d125fmws0bore1.cloudfront.net/assets/pages/leaderboard/leaderboard-complete-316433dd02f79185962dbaa82ad025c4722722e8ad276abe2aa00463a145691e.svg) no-repeat;
    background-size: contain;
    width: 3em;
    height: 3em;
}

@media (min-width: 33em) {
    .page-leaderboard .ranking .ranking-table-data:nth-child(3) .complete {
        width: 3.5em;
        height: 3.5em;
    }
}

/*! CSS Used from: Embedded */

iframe#_hjRemoteVarsFrame {
    display: none !important;
    width: 1px !important;
    height: 1px !important;
    opacity: 0 !important;
    pointer-events: none !important;
}

/*! CSS Used from: Embedded */

.icon-chat-bubble-call-to-action-cls-1 {
    fill: #182430;
}

.icon-chat-bubble-call-to-action-cls-2 {
    font-size: 14px;
    fill: #fff;
    font-family: "Open Sans", sans-serif;
}

.icon-chat-bubble-call-to-action-cls-3,
.icon-chat-bubble-call-to-action-cls-4 {
    fill: none;
    stroke: #fff;
    stroke-miterlimit: 10;
    stroke-width: 2px;
}

.icon-chat-bubble-call-to-action-cls-3 {
    stroke-linecap: round;
}

/*! CSS Used from: https://s3.amazonaws.com/rupert-public-files/udacity/tars.css */

app {
    height: 100%;
}

#rupertChatWrapper {
    height: 100%;
    margin: 0px;
    padding: 0px;
    font: normal normal 100% "Helvetica Neue", Helvetica, sans-serif;
    font-size: 14px;
    background-color: #fff;
    overflow: hidden;
}

#rupertChatWrapper *::-webkit-input-placeholder {
    color: #c3cdd4;
}

#rupertChatWrapper *:-moz-placeholder {
    color: #c3cdd4;
}

#rupertChatWrapper *::-moz-placeholder {
    color: #c3cdd4;
}

#rupertChatWrapper *:-ms-input-placeholder {
    color: #c3cdd4;
}

#rupertChatWrapper div#chatview {
    height: 100%;
    position: relative;
    display: flex;
    flex-direction: column;
    margin: 0 auto;
    overflow: hidden !important;
}

/*! CSS Used from: Embedded */

#chat {
    position: fixed;
    right: 24px;
    bottom: 24px;
    z-index: 7000;
    cursor: pointer;
}

#chat>div {
    min-height: 450px;
    height: 40vh;
    width: 330px;
    border: 1px solid #c3cdd4;
}

#chat>#icon-chat-bubble-call-to-action {
    float: right;
    height: 60px;
    overflow: visible;
}

#chat>div>a {
    position: absolute;
    z-index: 101;
    right: 10px;
    top: 10px;
    line-height: 12px;
    background-color: #bcc9d4;
    height: 22px;
    width: 22px;
    text-align: center;
    border-radius: 50%;
}

#chat>div>a svg {
    fill: white;
    box-sizing: content-box;
    position: relative;
    top: 4px;
    height: 10px;
}

#icon-chat-bubble-call-to-action {
    animation: bounceInUp;
    animation-duration: 1s;
    animation-iteration-count: 1;
}

.icon-chat-bubble-call-to-action-close-background {
    transform: translateX(204px) translateY(30px);
    fill: rgba(255, 255, 255, 0.1);
}

.icon-chat-bubble-call-to-action-cls-1:hover,
.icon-chat-bubble-call-to-action-cls-2:hover,
.icon-chat-bubble-call-to-action-cls-2 tspan:hover,
.icon-chat-bubble-call-to-action-cls-3:hover,
.icon-chat-bubble-call-to-action-cls-4:hover,
.icon-chat-bubble-call-to-action-close:hover,
.icon-chat-bubble-call-to-action-close-background:hover {
    cursor: pointer;
}

.icon-chat-bubble-call-to-action-close {
    transform-origin: 50% 50%;
    transform: translateX(200px) translateY(26px);
    fill: rgba(255, 255, 255, 0.5);
}

.icon-chat-bubble-call-to-action-close-background:hover~.icon-chat-bubble-call-to-action-close,
.icon-chat-bubble-call-to-action-close:hover {
    transform-origin: 50% 50%;
    transform: translateX(200px) translateY(26px) scale(1.5, 1.5);
    fill: white;
}

/*! CSS Used keyframes */

@-webkit-keyframes bounceInUp {

    0%,
    60%,
    75%,
    90%,
    100% {
        -webkit-transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
        transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    }

    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, 3000px, 0);
        transform: translate3d(0, 3000px, 0);
    }

    60% {
        opacity: 1;
        -webkit-transform: translate3d(0, -20px, 0);
        transform: translate3d(0, -20px, 0);
    }

    75% {
        -webkit-transform: translate3d(0, 10px, 0);
        transform: translate3d(0, 10px, 0);
    }

    90% {
        -webkit-transform: translate3d(0, -5px, 0);
        transform: translate3d(0, -5px, 0);
    }

    100% {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
}

@keyframes bounceInUp {

    0%,
    60%,
    75%,
    90%,
    100% {
        -webkit-transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
        transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    }

    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, 3000px, 0);
        -ms-transform: translate3d(0, 3000px, 0);
        transform: translate3d(0, 3000px, 0);
    }

    60% {
        opacity: 1;
        -webkit-transform: translate3d(0, -20px, 0);
        -ms-transform: translate3d(0, -20px, 0);
        transform: translate3d(0, -20px, 0);
    }

    75% {
        -webkit-transform: translate3d(0, 10px, 0);
        -ms-transform: translate3d(0, 10px, 0);
        transform: translate3d(0, 10px, 0);
    }

    90% {
        -webkit-transform: translate3d(0, -5px, 0);
        -ms-transform: translate3d(0, -5px, 0);
        transform: translate3d(0, -5px, 0);
    }

    100% {
        -webkit-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
}

@keyframes bounceInUp {

    from,
    60%,
    75%,
    90%,
    to {
        animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    }

    from {
        opacity: 0;
        transform: translate3d(0, 3000px, 0);
    }

    60% {
        opacity: 1;
        transform: translate3d(0, -5px, 0);
    }

    75% {
        transform: translate3d(0, 3px, 0);
    }

    90% {
        transform: translate3d(0, -2px, 0);
    }

    to {
        transform: translate3d(0, 0, 0);
    }
}

/*! CSS Used fontfaces */

@font-face {
    font-family: "Open Sans";
    font-style: normal;
    font-weight: 300;
    src: local("Open Sans Light"), local("OpenSans-Light"),
        url(https://fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTaRDOzjiPcYnFooOUGCOsRk.woff) format("woff");
}

@font-face {
    font-family: "Open Sans";
    font-style: normal;
    font-weight: 400;
    src: local("Open Sans"), local("OpenSans"),
        url(https://fonts.gstatic.com/s/opensans/v13/cJZKeOuBrn4kERxqtaUH3bO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
}

@font-face {
    font-family: "Open Sans";
    font-style: normal;
    font-weight: 600;
    src: local("Open Sans Semibold"), local("OpenSans-Semibold"),
        url(https://fonts.gstatic.com/s/opensans/v13/MTP_ySUJH_bn48VBG8sNSqRDOzjiPcYnFooOUGCOsRk.woff) format("woff");
}

@font-face {
    font-family: "Open Sans";
    font-style: italic;
    font-weight: 300;
    src: local("Open Sans Light Italic"), local("OpenSansLight-Italic"),
        url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxvR_54zmj3SbGZQh3vCOwvY.woff) format("woff");
}

@font-face {
    font-family: "Open Sans";
    font-style: italic;
    font-weight: 400;
    src: local("Open Sans Italic"), local("OpenSans-Italic"),
        url(https://fonts.gstatic.com/s/opensans/v13/xjAJXh38I15wypJXxuGMBrrIa-7acMAeDBVuclsi6Gc.woff) format("woff");
}
</style>
