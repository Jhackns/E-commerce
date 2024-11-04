import {useContext } from "react"
import { Context } from "../../Context/Context"

import NavBar from "../NavBar/NavBar"
import CartElements from "./CartElements"
import CartTotal from "./CartTotal"

import './CartContent.css'

const CartContent = () => {
  const {cart} = useContext(Context)
  return (
    <>
    <NavBar/>
    {cart.length > 0 ? (
        <>
          <CartElements />
          <CartTotal />
        </>
      ) : (
        <div className='cart-message-center'>
          <h2>Tu carro esta vacio</h2>
        </div>
      )}
    </>
  )
}

export default CartContent