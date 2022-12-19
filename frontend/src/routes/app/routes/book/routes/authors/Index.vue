<template>
  <crud
    mode="ServerSide"
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
      prefix: null,
      path: 'book-author',
      paths: {},
      pageTitle: 'book.authors',
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
          type: 'input',
          column: 'name',
          text: this.$t('fields.name'),
          name: 'name',
          multiedit: false,
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
        detailsTitle: 'Author',
        fields: {
          id: 'Id',
          name: 'Name',
          createdAt: 'Created at',
          updatedAt: 'Updated at',
        },
      },
      en: {
        detailsTitle: 'Author',
        fields: {
          id: 'Id',
          name: 'Name',
          createdAt: 'Created at',
          updatedAt: 'Updated at',
        },
      },
    },
  },
}

</script>
