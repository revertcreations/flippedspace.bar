// @flow

import { STATIC_PATH } from '../shared/config'

const renderApp = (title: string) =>
`
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>${STATIC_PATH}</title>
  <link rel="stylesheet"href="${STATIC_PATH}/css/style.css">
</head>
<body>
  <h1>${title}</h1>
</body>
</html>
`

export default renderApp
