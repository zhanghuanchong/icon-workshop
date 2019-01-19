const files = require.context('.', false, /\.js/)
const entries = {}

files.keys().forEach(key => {
  if (key === './index.js') return
  entries[key.replace(/(\.\/|\.js)/g, '')] = files(key).default
})

export default entries
