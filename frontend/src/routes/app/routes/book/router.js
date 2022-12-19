import Authors from './routes/authors/Index.vue'
import Titles from './routes/titles/Index.vue'
import BookTags from './routes/book-tags/Index.vue'
import Tags from './routes/tags/Index.vue'

let bookRoutes = [
  {
    path: 'authors',
    name: 'book-authors',
    component: Authors,
  },
  {
    path: 'titles',
    name: 'book-titles',
    component: Titles,
  },
  {
    path: 'book-tags',
    name: 'book-titles-tags',
    component: BookTags,
  },
  {
    path: 'tags',
    name: 'book-tags',
    component: Tags,
  },
]

export default bookRoutes
