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
            <label for="">Album id</label>
            <div class="mb-3">
                <input type="number" v-model="album_id" class="form-control" placeholder="album" />
            </div>
            <input @click.prevent="store" :disabled="!isDisabled" type="submit" value="add" class="btn btn-primary">
        </div>
    </div>

</template>
<script>
import router from "../../router.js";
export default {
    data() {
        return {
            song_title: null,
            duration: null,
            album_id: null,
        }
    },
    methods: {
        store() {
            axios.post('/api/songs/store', { song_title: this.song_title, duration: this.duration, album_id: this.album_id }).then(res => {
                this.show('foo-velocity', 'success');
                router.push({ name: 'songs.all' });
            }).catch(()=>{
                this.show('foo-velocity', 'error');
            })
        },
        show (group, type = '') {
        const text = `
        Песня удалена!
        <br>
        Date: ${new Date()}`

        this.$notify({
        group,
        title: `Test ${type} notification #${this.id++}`,
        text,
        type,
        data: {
          randomNumber: Math.random()
        }
      })
    },

    clean (group) {
      this.$notify({ group, clean: true })
    }
    },
    computed: {
        isDisabled() {
            return this.song_title && this.duration && this.album_id
        }
    }
}

</script>
