<template>
    <div v-if="artists">
        <div v-for="album in artists.album">
            <div class="card" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ album.album_name }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ artists.artist_name }}</h6>
                    <div v-for="song in album.song">
                        {{ song.song_title }}
                        <button class="btn btn-primary" @click.prevent="deleteSong(song.id)">Delete</button>
                    </div>
                    <div>
                        <router-link class="btn btn-primary m-3"
                            :to="{ name: 'artist.add', params: { id: artists.id } }">
                            Добавить песню</router-link>
                    </div>
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
        this.getArtist();
    },
    methods: {
        getArtist() {
            axios.get('/api/album/get/' + this.$route.params.id).then(res => {
                this.artists = res.data;
                console.log(this.artists);
            })
        },
        deleteSong(id) {
            axios.delete('/api/songs/delete/' + id).then(res => {
                this.getArtist()
            })

        },
    }
}
</script>