<template>
  <crud
    :prefix="prefix"
    :path="path"
    :paths="paths"
    :page-title="pageTitle"
    :fields-info="fieldsInfo"
    :details-title="$t('detailsTitle')"
    deleteMode="hard"
  >
  </crud>
</template>

<script>
import Crud from '@/utils/crud/components/Crud.vue'

export default {
  data () {
    return {
      prefix: 'crud/book',
      path: 'book-tags',
      paths: {
        i: 'book/book-tags',
      },
      pageTitle: 'book.bookTags',
    }
  },
  computed: {
    fieldsInfo () {
      return [
        {
          text: this.$t('fields.id'),
          name: 'id',
          details: false,
        },
        {
          type: 'select',
          url: 'crud/book/titles',
          list: {
            value: 'id',
            text: 'title',
            data: [],
          },
          column: 'book_id',
          text: this.$t('fields.book'),
          name: 'book_id',
          apiObject: {
            name: 'book.title',
          },
        },
        {
          text: this.$t('fields.bookAuthor'),
          name: 'book_author',
          apiObject: {
            name: 'book.author.name',
          },
          details: false,
        },
        {
          text: this.$t('fields.bookDescription'),
          name: 'book_description',
          apiObject: {
            name: 'book.description',
          },
          details: false,
        },
        {
          text: this.$t('fields.bookCreatedAt'),
          name: 'book_created_at',
          apiObject: {
            name: 'book.created_at',
          },
          details: false,
        },
        {
          type: 'select',
          url: 'crud/book/tags',
          list: {
            value: 'id',
            text: 'name',
            data: [],
          },
          column: 'tag_id',
          text: this.$t('fields.tag'),
          name: 'tag_id',
          apiObject: {
            name: 'tag.name',
          },
        },
      ]
    },
  },
  components: {
    Crud,
  },
  i18n: {
    messages: {
      es: {
        detailsTitle: 'Book - tag',
        fields: {
          id: 'Id',
          book: 'Store',
          bookDescription: 'Book description',
          bookCreatedAt: 'Book creation date',
          bookAuthor: 'Book author',
          tag: 'Tag',
        },
      },
      en: {
        detailsTitle: 'Book - tag',
        fields: {
          id: 'Id',
          book: 'Store',
          bookDescription: 'Book description',
          bookCreatedAt: 'Book creation date',
          bookAuthor: 'Book author',
          tag: 'Tag',
        },
      },
    },
  },
}

</script>
