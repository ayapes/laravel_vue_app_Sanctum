import { createRouter, createWebHistory } from 'vue-router'
// 必要なコンポーネントをインポート
import BookList from '../components/BookList.vue'
import BookDetail from '../components/BookDetail.vue'
import BookAdd from '../components/BookAdd.vue'
import UserList from '../components/UserList.vue'
import BookSearch from '../components/BookSearch.vue'
import HomeView from '../components/HomeView.vue'
import Login from '../components/Login.vue'
import Logout from '../components/Logout.vue'

export const router = createRouter({
    history: createWebHistory(),
    routes: [
        // 必要な数だけ書く
        {
            path: '/',
            name: 'index',
            component: BookSearch,
        },
        {
            path: '/books',
            name: 'books',
            component: BookList,
        },
        {
            path: '/add',
            // nameには一意な名前をつける
            name: 'add',
            component: BookAdd,
        },
        {
            path: '/search',
            // nameには一意な名前をつける
            name: 'search',
            component: BookSearch,
        },
        {
            path: '/user',
            // nameには一意な名前をつける
            name: 'user',
            component: UserList,
        },
        {
            path: '/bookk/:id',
            name: 'bookk',
            component: BookDetail,
        },
        {
            path: '/test',
            name: 'test',
            component: HomeView,
        },

        {
            path:'/login',
            name:'login',
            component:Login,
        },

        {
            path: '/logout',
            name: 'logout',
            component: Logout,
            beforeEnter: (to, from, next) => {
                if (document.cookie.includes('XSRF-TOKEN')) {
                    next();
                } else {
                    next('/login');
                }
            }
        }
    ]
})

export default router