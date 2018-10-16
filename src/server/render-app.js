// @flow

import { STATIC_PATH } from '../shared/config'

const renderApp = (title: string) => `
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>${title}</title>
    <link rel="stylesheet"href="${STATIC_PATH}/css/style.css">
  </head>
  <body>
    <header>
      <div class="logo">
        <pre>
 _______  ___      ___   _______  _______  _______  ______   _______  _______  _______  _______  _______        _______  _______  ______   
|       ||   |    |   | |       ||       ||       ||      | |       ||       ||   _   ||       ||       |      |  _    ||   _   ||    _ |  
|    ___||   |    |   | |    _  ||    _  ||    ___||  _    ||  _____||    _  ||  |_|  ||       ||    ___|      | |_|   ||  |_|  ||   | ||  
|   |___ |   |    |   | |   |_| ||   |_| ||   |___ | | |   || |_____ |   |_| ||       ||       ||   |___       |       ||       ||   |_||_ 
|    ___||   |___ |   | |    ___||    ___||    ___|| |_|   ||_____  ||    ___||       ||      _||    ___| ___  |  _   | |       ||    __  |
|   |    |       ||   | |   |    |   |    |   |___ |       | _____| ||   |    |   _   ||     |_ |   |___ |   | | |_|   ||   _   ||   |  | |
|___|    |_______||___| |___|    |___|    |_______||______| |_______||___|    |__| |__||_______||_______||___| |_______||__| |__||___|  |_|
        </pre>
      </div>
      <nav style="position: absolute; top: 5px; right: 20px;">
        <ul>
          <li><a href="/login">login</a></li>
          <li><a href="/signup">signup</a></li>
        </ul>
      </nav>
    </header>
  </body>
  </html>
  `

export default renderApp
