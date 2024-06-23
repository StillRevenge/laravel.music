<template>
    <div>
        <div class="mb-3">
            <label for="">Title</label>
            <div class="mb-3">
                <input type="text" v-model="song_title" class="form-control" placeholder="title" />
            </div>
            <label for="">Duration</label>
            <div class="mb-3">
                <input type="text" v-model="duration" class="form-control" placeholder="duration" />
            </div>
            <label for="">Album id</label>
            <div class="mb-3">
                <input type="number" v-model="album_id" class="form-control" placeholder="album" />
            </div>
            <input type="submit" :disabled="!isDisabled" @click.prevent="updateSong" value="update"
                class="btn btn-primary">
        </div>
    </div>
</template>

<script>
import router from '../../router';
export default {
    data() {
        return {
            song_title: null,
            duration: null,
            album_id: null,
        }
    },
    mounted() {
        this.getSong()
    },
    methods: {
        getSong() {
            axios.get('/api/songs/get/' + this.$route.params.id).then(res => {
                this.song_title = res.data.data.song_title;
                this.duration = res.data.data.duration;
                this.album_id = res.data.data.album_id;
            })
        },
        updateSong() {
            axios.patch('/api/songs/edit/' + this.$route.params.id, { song_title: this.song_title, duration: this.duration, album_id: this.album_id }).then(res => {
                router.push({ name: 'song.get', params: { id: this.$route.params.id } });
                console.log(res.data);
            })
        }
    },
    computed: {
        isDisabled() {
            return this.song_title || this.duration || this.album_id
        }
    }
}
</script>