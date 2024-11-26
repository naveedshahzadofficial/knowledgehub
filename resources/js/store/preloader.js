import {defineStore} from "pinia";

export const usePreLoaderStore = defineStore('preLoaderStore', {
    state: () => ({ isShow: false  }),
    getters: {
    },
    actions: {
        setIsShow(isHidden) {
            this.isShow = isHidden;
        },
    },
})
