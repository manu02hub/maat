<script setup>
import { Link } from "@inertiajs/vue3";

// const clases = computed(() =>
//     props.active
//         ? 'active'
//         : ''
// );
</script>

<template>
    
    <nav class="nav">
        <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">
            <img src="../../../img/icons/menu.svg" />
        </label>
        <label class="logo">maat</label>
        <ul>
            <li>
                <Link
                    :href="route('index')"
                    :class="{ active: route().current('index') }"
                    >Inicio</Link
                >
            </li>
            <li>
                <Link
                    :href="route('noticias')"
                    :class="{ active: route().current('noticias') }"
                    >Noticias</Link
                >
            </li>
            <li>
                <Link
                    :href="route('donativos')"
                    :class="{ active: route().current('donativos') }"
                    >Donativos</Link
                >
            </li>
            <li>
                <Link
                    :href="route('recogerRanking')"
                    :class="{ active: route().current('recogerRanking') }"
                    >Ranking</Link
                >
            </li>
            <li v-if="$page.props.auth.user != null">
                <Link
                    :href="route('login')"
                    :class="{ active: route().current('login') }"
                    >Area privada</Link
                >
            </li>
            <li v-if="$page.props.auth.user == null">
                <Link
                    :href="route('login')"
                    :class="{ active: route().current('login') }"
                    >Login</Link
                >
            </li>
            <li v-if="$page.props.auth.user == null">
                <Link
                    :href="route('register')"
                    :class="{ active: route().current('register') }"
                    >Registro</Link
                >
            </li>
        </ul>
    </nav>
    <section></section>
</template>

<style scoped>
.nav {
    font-family: "Poppins", sans-serif;
    width: 100%;
    --blue: #12d2db;
    --white: #fcf2fa;
    --green: #529541aa;
    --green-blc: #230622dd;
    --shadow: 0 5px 10px 5px rgba(0, 0, 0, 0.3);
    --navColor: linear-gradient(
        to right,
        rgba(59, 215, 72, 0.6) 5%,
        rgba(8, 51, 11, 0.9)
    );
}

* {
    padding: 0;
    margin: 0;
    text-decoration: none;
    box-sizing: border-box;
}

nav {
    position: absolute;
    background: var(--navColor);
    box-shadow: var(--shadow);
    height: 80px;
    width: 100%;
    z-index: 100;
    margin: 0;
}
label.logo {
    color: var(--white);
    font-size: 30px;
    line-height: 80px;
    padding: 0 80px;
    letter-spacing: -1px;
    font-weight: 800;
    font-style: italic;
    transition: 0.2s ease;
    text-shadow: 3px 5px 20px #230622aa;
}
nav ul {
    float: right;
    margin-right: 80px;
}
nav ul li {
    display: inline-block;
    line-height: 80px;
}
nav ul li a {
    color: var(--white);
    font-size: 17px;
    padding: 7px 13px;
    border-radius: 13px;
    /* text-transform: lowercase; */
}
a.active,
a:hover {
    background: var(--green);
    transition: 0.5s;
}
.checkbtn {
    line-height: 80px;
    font-size: 30px;
    float: right;
    cursor: pointer;
    margin-right: 40px;
    display: none;
}
.checkbtn i {
    color: var(--white);
    padding: 5px;
    border-radius: 10px;
    transition: 0.5s ease;
}
.checkbtn i:hover {
    background: var(--green);
}
#check {
    display: none;
}
section {
    padding: 5%;
}

/* responsove code */
@media (max-width: 952px) {
    /* table mode */
    label.logo {
        font-size: 25px;
        padding-left: 50px;
    }
    nav ul li a {
        font-size: 14px;
    }
    section {
        padding: 7%;
    }
}

@media (max-width: 858px) {
    nav{
        width: 100%;
    }
    /* mobile mode */
    .checkbtn {
        display: block;
        margin: 0;
        z-index: 109;
        padding: 27px;
    }
    ul {
        position: fixed;
        width: 100%;
        height: 100%;
        background: var(--green-blc);
        top: 80px;
        left: -100%;
        padding-top: 80px;
        text-align: center;
        transition: 0.5s ease;
    }
    nav ul li {
        display: block;
        margin: 30px 0;
        line-height: 30px;
    }
    nav ul li a {
        font-size: 20px;
    }
    a.active,
    a:hover {
        background: none;
        color: var(--blue);
        text-shadow: 0 10px 15px var(--blue);
    }
    #check:checked ~ ul {
        left: 0;
    }
    section {
        padding: 8%;
    }
}
</style>
