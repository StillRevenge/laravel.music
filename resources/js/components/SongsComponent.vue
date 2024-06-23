<template>
    <div v-for="artist in artists">
        <div v-for="album in artist.album">
            <div class="card" style="width: 25%;">
                <div class="card-body row">
                    <h5 class="card-title">{{ album.album_name }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ artist.artist_name }}</h6>
                    <div v-for="song in album.song">
                        {{ song.song_title }}
                    </div>
                    <router-link class="btn btn-primary" :to="{ name: 'artist.get', params: { id: artist.id } }">К
                        исполнителю</router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            artists: null,
        }
    },
    mounted() {
        this.getArtists();
    },
    methods: {
        getArtists() {
            axios.get('api/albums/all').then(res => {
                this.artists = res.data;
                console.log(res.data);
            })
        },
        getAlbum() {
            axios.get()
        }
    }
}
</script>
