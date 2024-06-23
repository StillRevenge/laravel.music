<template>
    <div class="w-25">
        <h2>Create song</h2>
        <div class="mb-3">
            <label for="">Title</label>
            <div class="mb-3">
                <input type="text" v-model="song_title" class="form-control" placeholder="title" />
            </div>
            <label for="">Duration</label>
            <div class="mb-3">
                <input type="text" v-model="duration" class="form-control" placeholder="duration" />
            </div>
            <label for="">Album name</label>
            <div v-if="album" class="mb-3">
                <h3>{{ album.album_name }}</h3>
            </div>
            <input @click.prevent="store" type="submit" value="add" class="btn btn-primary">
        </div>
    </div>
</template>

<script>
import router from '../../router';
export default {
    data() {
        return {
            album: null,
            song_title: null,
            duration: null,
        }
    },
    mounted() {
        this.getAlbum()
    },
    methods: {
        getAlbum() {
            axios.get('/api/album/getname/' + this.$route.params.id).then(res => {
                this.album = res.data;
                console.log(res.data);
            })
        },
        store() {
            axios.post('/api/songs/store', { song_title: this.song_title, duration: this.duration, album_id: this.album.id }).then(res => {
                router.push({ name: 'artist.get', params: { id: this.album.id } });
            })
        }
    }
}
</script>