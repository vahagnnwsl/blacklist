<template>
    <div>
        asd asdasds asds
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "Test",
        created() {


            axios.post('/api/arendator', {}, {
                    'headers': {
                        Accept: 'application/json',
                        Authorization : 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiODQwYmFhY2Y2YjJjMWY2M2ZhNzEzMmJmOGIwMTlmZDBhMThhNjAyODYzY2ZjNmFlMDU4ZDg4NzBmNDE2MDE3YTg0N2Y2ZTllYWFmMWYyYmMiLCJpYXQiOjE1ODY5MTUyMTEsIm5iZiI6MTU4NjkxNTIxMSwiZXhwIjoxNTg4MjExMjExLCJzdWIiOiIiLCJzY29wZXMiOlsiKiJdfQ.rPzALxGPDbQCKcR_-aMAME5VRAFm0TKZzyYRPJr_wszfAeYdXE7GmdMfS3Ms-c3axMPfQKY8wJsLJC9YdO0lBKGQpkF7zr0NVvWG1fcaDNPdh9Qh53QLh2VCKXl1j3SOvzWGKhmc_OTAvURrEVbszlqtrUkvnw8P8PRtsTbQ4w--mSxJEIuFLC3qCKw5-XMp3IEWOOtScyTOhdmN0x10ew0VFBEzRJdir0G9jI1mLYFHYI5HTAVgLj8AD69U-2sZc6RiZmUjoiVhfZYno53TM00JHHYJjuB2mlbQHytahEMY97bjm6bkNMDGk5kVEqccHMRMt2cuZQgaxXn1KuDJ8AcK1qwjxGPThX1XPrlAtO7KMHL8sMNlh8Jm3hrTiKNcL517-tMSqzp1sHo_NothvNLFkZXHcHhIiK4YzNt4QT5nwfCsU2HL5OU3va2eNUXecuCCudcK74HNiPsYSIGcAwjCd1kY7G0iy1hiyXERuV9n-qk9JGtcwfb7k11tvK3gcmJFyI9uq3rI4UbZQdYq4bM1Es1MerU2kn-TCMvGVZap3bq8JijgN_sIHTgNXzq6cOjrZPYr0-aT7gCKmXJXgLBGLTklHB9n-mMgH1EeYwtIABZt13wLb1CSGxW4dRTmjCBz6TU6WEJK3j4ROinhhKmNcyC3f3pfftxonVZzfQ0',
                    }
                }
            ).then((resp) => {
                console.log(resp)
            })
        },
    }
</script>

<style scoped>

</style>
