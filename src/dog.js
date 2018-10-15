// @flow

class Dog {
  name: string

  constructor(name: string) {
    this.name = name
  }

  bark() {
    return `Bork, bork, I am ${this.name}`
  }
}

export default Dog
