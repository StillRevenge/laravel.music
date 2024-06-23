<template xmlns="http://www.w3.org/1999/html">
    <div class="container" v-bind:class="(loading) ? 'container--disabled' : ''">
        <div class="header">
            <h2>Home</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">

                <button @click="getNextPage()">get next page</button>

                <div v-for="song in songs" class="songs__song">
                    <div class="card">
                        <div class="card-header">Song Title: {{ song.song_title }}</div>
                        <div class="card-body">
                            Song durationr: {{ song.duration }}
                            Album number: {{ song.album_id }}
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</template>

<script>

export default {
    created() {
        window.addEventListener('scroll', this.handleScroll);
    },
    mounted() {
        this.getNextPage();
        console.log('Component mounted.')
    },
    data() {
        return {
            id: null,
            changedId: null,
            user: null,
            songs: [],
            users: [],
            currentPageNumber: 1,
            itemsOnPage: 10,
            loading: false,
            names: null
        }
    },
    methods: {
        add() {
            this.id++;
        },
        async getUser(id) {
            axios.get('/api/songs/' + id).then((songResponse) => {
                this.songs = songResponse.data;
            }
            ).catch(() => {
                console.log('произошла ошибка')
            })

        },
        async getAll() {
            axios.get('/api/songs/all').then(res => {
                this.songs = res.data;
            }
            ).catch(() => {
                console.log('произошла ошибка')
            })
        },
        getNames() {
            axios.get('/api/albums/names').then(res => {
                this.names = res.data;
            })
        },
        async getNextPage() {
            if (this.loading === false) {
                this.loading = true;
                axios.post('/api/songs/get-page/', {
                    pageNumber: this.currentPageNumber++,
                    itemsOnPage: this.itemsOnPage
                }).then((songsResponse) => {
                    this.songs.push(...songsResponse.data.data);
                    this.loading = false;
                }
                ).catch(() => {
                    console.log('произошла ошибка');
                    this.loading = false;
                })
            }
        },
        async handleScroll($event) {
            if (window.innerHeight + window.scrollY >= document.documentElement.scrollHeight) {
                await this.getNextPage();
            }
        }

    },
    watch: {
        async id(newVal, oldVal) {
            await this.getUser(newVal);
            this.changedId = newVal - 3;
        }
    },
    computed: {
        // a computed getter
        publishedBooksMessage() {
            return this.id > 5 ? 'Yes' : 'No'
        }
    }
}
</script>

<style lang="scss">
.songs {
    border: 1px solid red;
    border-radius: 10px;
    margin: 10px;

    &__song {
        border: 1px solid blue;
        border-radius: 5px;
        margin: 10px;
        padding: 3px;
    }

    &__name {
        color: aquamarine;
    }
}

.container--disabled {
    opacity: .5;
}
</style>