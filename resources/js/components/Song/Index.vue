<template>
    <div>
        <button @click="showNote()">sdas</button>
        <table class="table">
            
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">duration</th>
                    <th scope="col">album</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="song in songs">
                    <th scope="row">{{ song.id }}</th>
                    <td>{{ song.song_title }}</td>
                    <td>{{ song.duration }}</td>
                    <td>{{ song.album_id }}</td>
                    <td><audio controls="" style="vertical-align: middle" :src="song.song_path" type="audio/mp3" controlslist="nodownload">Your browser does not support the audio element.
            </audio></td>
                    <button class="btn btn-primary"><router-link
                            :to="{ name: 'song.get', params: { id: song.id } }">Show</router-link></button>
                    <button class=" btn btn-primary" @click.prevent="deleteSong(song.id)">Delete</button>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            songs: null,
            id: 0,
        }
    },
    mounted() {
        this.getSongs()
    },
    methods: {
        getSongs() {
            axios.get('/api/songs/all')
                .then(res => { this.songs = res.data })

        },
        deleteSong(id) {
            axios.delete('/api/songs/deletse/' + id).then(res => {
                this.show('foo-velocity', 'success');
                this.getSongs();
            }).catch(()=>{

                this.show('', 'error');
                console.log('error');
            })
        },
        show (group, type = '') {
      const text = `
        This is notification text!
        <br>
        Date: ${new Date()}
      `

      this.$notify({
        group,
        title: `Test ${type} notification #${this.id++}`,
        text,
        type,
      })
    },

    clean (group) {
      this.$notify({ group, clean: true })
    },
    showNote(){
        console.log('123');
        this.$notify({
        title: "Server Error"

    });
    }
        
    }
}
</script>