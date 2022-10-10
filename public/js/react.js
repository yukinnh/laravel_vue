import React, { useState } from 'react'

const App = ({ message }) => {
  const [items, setItems] = useState(Array(9).fill(0))
  const [flg, setFlg] = useState(false)

  const handleClickItem = index => {
    if (!flg) {
      setFlg(true)
    }

    const newItems = items.slice()
    newItems[index]++
    setItems(newItems)
  }

  const handleResetItems = () => {
    setFlg(false)
    setItems(Array(9).fill(0))
  }

  return (
    <div>
      <p>{flg && message}</p>
      <ul>{items.map((item, index) => {
        return (
          <li
            key={index}
            onClick={() => handleClickItem(index)}
          >
            {`Button${index}: ${item}`}
          </li>
        )
      })}</ul>
      <div onClick={handleResetItems}>Reset items</div>
    </div>
  )
}

export default App