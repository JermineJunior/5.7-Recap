<script src="{{asset('js/app.js')}}"></script>
<script>
var root = new Vue({
    el:'#form',
    data:{
     title:'',
     discription:'',
    }
    methods: {
        onSubmit(){
            axios.post('/project',$this.data)

        }
    },

})
</script>
