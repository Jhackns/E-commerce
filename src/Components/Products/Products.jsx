import {useContext, useState, useEffect } from "react"
import { Context } from "../../Context/Context"
import "./products.css"

const Products = () => {
    const [products, setProducts ] = useState([])
    const {buyProducts} = useContext(Context)
    const [message, setMessage] = useState("")

    useEffect(() => {
        fetch("data.json")
        .then((response) => response.json())
        .then((data) => setProducts(data))
    }, [])

    const handleBuy = (product) => {
        buyProducts(product)
        setMessage("Producto Agregado")
        setTimeout(() => setMessage(""), 2000)
    }

    return (
        <>
            {message && <div className="message">{message}</div>}
            {products.map((product) => {
                return (
                    <div className="card" key={product.id}>
                        <img src={product.img} alt="img-product-card" />
                        <h3>{product.name}</h3>
                        <h4>S/. {product.price}</h4>
                        <button onClick={() => handleBuy(product)}>
                            <div className="shadow"></div>
                            <div className="edge"></div>
                            <div className="front">Comprar</div>
                        </button>
                    </div>
                )
            })}
        </>
    )
}

export default Products