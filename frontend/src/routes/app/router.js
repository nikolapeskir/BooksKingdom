import Home from './routes/home/Index.vue'
import Book from './routes/book/Index.vue'
import bookRoutes from './routes/book/router'

let appRoutes = [
  {
    path: 'home',
    name: 'home',
    component: Home,
  },
  {
    path: 'book',
    name: 'book',
    component: Book,
    children: bookRoutes,
    meta: { guard: 'BOOK' },
  },
]

export default appRoutes
