import router from '../../routes/index.js';

export const namespaced = true;

export const state = {
    user: null,
};

export const mutations = {
    setUser(state, user) {
        state.user = user;
    }
};

export const actions = {
     getAuthUser({ commit }) {
        return new Promise((resolve, reject) => {
            axios
                .get('/auth-user')
                .then((response) => {
                    commit('setUser', response.data);
                    resolve(response.data);
                })
                .catch(error => {
                    commit('setUser', null);

                    if (router.currentRoute.name !== "register")
                        router.push({ path: "/register" });

                    // reject(error)
                });
        });
    }
};

export const getters = {
    authUser: (state) => {
        return state.user;
    }
};
