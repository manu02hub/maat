<script>

</script>

<template>
    <div class="containerAbout">
        <div class="containerText">
            <p class="title">About Us</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div>
            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                 Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                  reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                   culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>
</template>

<style>
    .containerAbout{
        display: grid;
        width: 100%;
        display: grid;
        background-repeat: no-repeat;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)), url("../../../img/banner.jpg");
        text-align: center;
        margin: 0 auto;
        grid-template-columns: 50% 50%;
        grid-template-rows: auto;
    }

    .title{
        font-size: 50px;
    }

    .containerAbout p{
        color: white;
    }

    .text{
        padding: 15% ;
        text-align: justify;
    }

    .containerText{
        padding-top: 15%;
    }

    .containerText p:last-child{
        margin-left: 25%;
        margin-right: 25%;
        font-size:small;

    }


</style>