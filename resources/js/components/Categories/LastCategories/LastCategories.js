export default {
    props: ['categoriesdata', 'isauth'],
    data() {
        return {
            categories: this.categoriesdata,
            isAuth: this.isauth
        }
    }
}
