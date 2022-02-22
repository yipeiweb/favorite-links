export default {
    props: ['userdata'],
    data() {
        return {
            user: {
                name: this.userdata.name ,
                email: this.userdata.email,
                password: ''
            }
        }
    },
    methods: {
        userUpdate(user){
            const params = {
                name: user.name,
                email: user.email,
                password: user.password
            };

            axios.put(`/user-update`, params)
                 .then(res=>{
                    this.$swal({
                        text: 'Se ha modificado el usuario correctamente!',
                        showCloseButton: true,
                        icon: 'success'
                    });

                    this.user.name = res.data.name;
                    this.user.email = res.data.email;
                    this.user.password = '';
                }).catch(err => {
                    this.$swal({
                        text: 'Opps! Ha producido un error en momento de modificar el usuario',
                        showCloseButton: true,
                        icon: 'error'
                      });
                });
        }
    }
}
