<template>
    <aside>
        <div class="logo">
            <img class="webfocus-logo" src="../../assets/images/web-focus.png" alt="company-logo"> 
        </div>
        <ul class="list-group">
            <li class="list-group-item"> 
                <router-link class="button" to="/admin/student_management">
                    <span class="link-dark"> Student Management </span>
                </router-link>
            </li>
            <li class="list-group-item"> 
                <router-link class="button" to="/admin/about">
                    <span class="link-dark"> About System </span>
                </router-link>
            </li>
        </ul>
    </aside>
</template>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<style lang="scss" scoped>
    aside {
        display:flex;
        flex-direction: column;
        width: calc(10rem + 132px);
        overflow: hidden;
        min-height: 100vh;

        background-color: #1e293b;
        color: #f1f5f9;

        transition: 0.2s ease-out;

        .logo {
            margin-bottom: 1rem;
            align-items: center;
            justify-content: center;
            display: flex;
            img {
                width: 5rem;
            }
        }

        @media(max-width: 768px) {
            position: fixed;
            z-index: 99; // Above all
        }
    }

    .webfocus-logo {
        margin-top: 10%;
        margin-bottom: 10%;
    }

</style>

<script> 


</script>