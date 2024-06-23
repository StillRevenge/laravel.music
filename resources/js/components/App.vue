<template>
    <notifications />
    <div>
        <div>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Music-Box</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <div class="nav-link active" aria-current="page"> <router-link to="/home">
                                    Home</router-link></div>
                            <div class="nav-link active" aria-current="page"> <router-link to="/songs">
                                    Songs</router-link></div>
                            <div class="nav-link active" aria-current="page"> <router-link to="/songs/create"> Add
                                    song</router-link></div>
                            <div class="nav-link active" aria-current="page"> <router-link to="/albums">
                                    Albums</router-link></div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div>
            <router-view> </router-view>
        </div>

        <footer class="py-3 border-top text-center">
            Music-box &copy; 2024
        </footer>
    </div>
</template>

<script>


</script>

<style></style>