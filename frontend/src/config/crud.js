export default {
  activityColumnName: 'deleted_at',
  primaryKey: 'id',
  deleteMode: 'hard',
  editButton: true,
  createMode: true,
  editMode: true,
  mainFilter: true,
  fieldFilter: true,
  exportButton: false,
  refreshButton: true,
  selectManyMode: true,
  updateManyMode: true,
  removeManyMode: true,
  fieldModifiers: {
    dateMinutesFromTimestamp: (param) => {
      return param.replace('T', ' ').substring(0, 16)
    },
    dateFromTimestamp: (param) => {
      return param.substring(0, 10)
    },
    timeFromTimestamp: (param) => {
      let tmp = param || ''
      return tmp.substring(0, 5)
    },
    datetimeFromTimestamp: (param) => {
      return '<nobr>' + param.substring(0, 19) + '</nobr>'
    },
    croppedText: (param) => {
      return (param == null || param.length < 100) ? param : param.substring(0, 100) + '...'
    },
    list: (param) => {
      return param ? param.map(obj => obj.tableList).join(', ') : ''
    },
    listTags: (param) => {
      return `<div style="max-width:200px;">${param ? param.map(obj => {
        return `<span class="crud-label">${obj.tag.name}</span>`
      }).join('') : ''}</div>`
    },
    lastReset: (param) => {
      if (param.length > 0) {
        return '<nobr>' + param[param.length - 1].reset_time.substring(0, 19) + '</nobr>'
      }
    },
    boolean: (param) => {
      return `<i aria-hidden class="v-icon material-icons">${param ? 'check' : 'clear'}</i>`
    },
  },
}
