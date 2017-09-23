import Vue from 'vue'
import Router from 'vue-router'
import Hello from '@/components/Hello'
import Board from '@/components/Board'
import IssueView from '@/components/Issues/View'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/hi',
      name: 'Hello',
      component: Hello
    },
    {
        path: '/board',
        name: 'Board',
        component: Board
    },
    {
        path: '/issues/view/:id?',
        name: 'IssueView',
        component: IssueView
    }
  ]
})
