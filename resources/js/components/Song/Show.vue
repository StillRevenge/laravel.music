<template>
    <div v-if="song">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ song.song_title }}</h5>
                <p class="card-text">{{ song.duration }}</p>
                <router-link :to="{ name: 'song.edit', params: { id: song.id } }"
                    class="btn btn-primary">Edit</router-link>
            </div>
        </div>
    </div>
    <div>
        <input type="file" id="file" ref="file" name="file" v-on:change="handleFileUpload()"/>
        <button @click="submitFile()">Upload Song</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            song: null,
            file: '',
        }

    },
    mounted() {
        this.getSong()
    },
    methods: {
        getSong() {
            axios.get('/api/songs/get/' + this.$route.params.id).then(res => {
                this.song = res.data.data;
            })
        },
        uploadSong(){
            axios.patch('/api/songs/upload/'+ this.$route.params.id,{songfile: this.songfile}).then(res=>{
                console.log(this.songfile);
                router.push({ name: 'song.get', params: { id: this.$route.params.id } });
            })
        },
        handleFileUpload(){
            this.file = this.$refs.file.files[0];
      },
      submitFile(){
        let formData = new FormData();
        formData.append('file', this.file);
        axios.post( '/api/songs/upload/'+ this.$route.params.id,
  formData,
  {
    headers: {
        'Content-Type': 'multipart/form-data'
    }
  }
).then(function(){
  console.log('SUCCESS!!');
})
.catch(function(){
  console.log('FAILURE!!');
});
      },
    }
}
</script>