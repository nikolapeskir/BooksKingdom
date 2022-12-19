<template>
  <crud
    mode="ServerSide"
    :prefix="prefix"
    :path="path"
    :paths="paths"
    :page-title="pageTitle"
    :fields-info="fieldsInfo"
    :details-title="$t('detailsTitle')"
    :item-elements="itemElements"
    item-details-width="1200"
  >
  </crud>
</template>

<script>
import Crud from '@/utils/crud/components/Crud.vue'

export default {
  data () {
    return {
      prefix: null,
      path: 'book',
      paths: {},
      pageTitle: 'book.titles',
    }
  },
  computed: {
    itemElements () {
      return {
        // bookTags: {
        //   title: this.$t('itemElements.bookTags.title'),
        //   url: 'book/titles/{id}/tags',
        //   controller: 'crud/books/book-tags',
        //   itemObject: 'tag_books',
        //   columns: [
        //     {
        //       obj: 'name',
        //       name: 'tag',
        //       header: this.$t('itemElements.bookTags.headers.tag'),
        //     },
        //   ],
        //   primaryId: 'book_id',
        //   foreignId: 'tag_id',
        //   icon: 'local_offer',
        //   color: 'purple',
        //   buttonText: this.$t('itemElements.bookTags.title'),
        // },
      }
    },
    fieldsInfo () {
      return [
        {
          text: this.$t('fields.id'),
          name: 'id',
          details: false,
        },
        {
          type: 'input',
          column: 'title',
          text: this.$t('fields.title'),
          name: 'title',
          multiedit: false,
          // onChange: (value, fields) => {
          //   fields.find(field => field.name === 'slug').value = slugify(value)
          // },
        },
        {
          type: 'select',
          url: 'book-author',
          list: {
            value: 'id',
            text: 'name',
            data: [],
          },
          column: 'author_id',
          text: this.$t('fields.author_id'),
          name: 'author_name',
        },
        // {
        //   name: 'tags',
        //   text: this.$t('fields.tags'),
        //   details: false,
        //   apiObject: {
        //     name: 'book_tags',
        //     functions: ['listTags'],
        //   },
        //   textMode: 'html',
        // },
        // {
        //   type: 'textarea',
        //   column: 'description',
        //   text: this.$t('fields.description'),
        //   name: 'description',
        //   multiedit: false,
        // },
        // {
        //   type: 'file',
        //   column: 'image',
        //   text: this.$t('fields.image'),
        //   name: 'image',
        //   multiedit: false,
        //   required: false,
        //   textMode: 'file',
        // },
        // {
        //   type: 'file',
        //   column: 'thumbnail',
        //   text: this.$t('fields.thumbnail'),
        //   name: 'thumbnail',
        //   multiedit: false,
        //   textMode: 'file',
        // },
        // {
        //   type: 'richTextBox',
        //   richTextBoxOperations: [
        //     'History',
        //     'Bold',
        //     'Italic',
        //     'Underline',
        //     'Strike',
        //     'Paragraph',
        //     'ListItem',
        //     'BulletList',
        //     'OrderedList',
        //     {
        //       name: 'Heading',
        //       options: {
        //         levels: [
        //           1,
        //           2,
        //           3,
        //         ],
        //       },
        //     },
        //     'HardBreak',
        //     'HorizontalRule',
        //     'Blockquote',
        //     'Code',
        //     'Link',
        //     'Image',
        //   ],
        //   column: 'content',
        //   text: this.$t('fields.content'),
        //   name: 'content',
        //   multiedit: false,
        //   table: false,
        // },
        // {
        {
          type: 'date',
          column: 'published_at',
          text: this.$t('fields.publishedAt'),
          name: 'published_at',
          multiedit: false,
          required: true,
          apiObject: {
            name: 'published_at',
            functions: ['dateMinutesFromTimestamp'],
          },
        },
        {
          type: 'input',
          column: 'created_at',
          text: this.$t('fields.createdAt'),
          name: 'created_at',
          apiObject: {
            name: 'created_at',
            functions: ['dateMinutesFromTimestamp'],
          },
          multiedit: false,
          disabled: true,
          required: false,
        },
        {
          type: 'input',
          column: 'updated_at',
          text: this.$t('fields.updatedAt'),
          text: this.$t('fields.updatedAt'),
          name: 'updated_at',
          apiObject: {
            name: 'updated_at',
            functions: ['dateMinutesFromTimestamp'],
          },
          multiedit: false,
          disabled: true,
          required: false,
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
        detailsTitle: 'Book',
        fields: {
          id: 'Id',
          title: 'Title',
          author_id: 'Author',
          tags: 'Tags',
          user: 'Author',
          publishedAt: 'Published at',
          createdAt: 'Created at',
          updatedAt: 'Updated at',
        },
        itemElements: {
          bookTags: {
            title: 'Tags',
            headers: {
              tag: 'Tag',
            },
          },
        },
      },
      en: {
        detailsTitle: 'Book',
        fields: {
          id: 'Id',
          title: 'Title',
          author_id: 'Author',
          tags: 'Tags',
          user: 'Author',
          publishedAt: 'Published at',
          createdAt: 'Created at',
          updatedAt: 'Updated at',
        },
        itemElements: {
          bookTags: {
            title: 'Tags',
            headers: {
              tag: 'Tag',
            },
          },
        },
      },
    },
  },
}

</script>
