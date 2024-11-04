import { useContext } from "react";
import { Context } from "../../Context/Context";
import CartItemCounter from "./CartItemCounter";

const CartElements = () => {
    const { cart, setCart } = useContext(Context);

    const deleteProducts = (id) => {
        const foundId = cart.find((element) => element.id === id);

        const newCart = cart.filter((element) => {
            return element !== foundId;
        });

        setCart(newCart);
    };

    return (
        <div className="cart-elements-container" style={{ marginTop: '60px' }}> {/* Asegúrate de que este valor coincida con la altura del navbar */}
            {cart.map((product) => {
                return (
                    <div className="product-card-container" key={product.id}>
                        <img src={product.img} alt="product-card" />
                        <h3>{product.name}</h3>
                        <CartItemCounter product={product} />
                        <h4>{product.price * product.quanty}</h4>
                        <h3 className="cart-delete-product" onClick={() => deleteProducts(product.id)}>
                            ❌
                        </h3>
                    </div>
                );
            })}
        </div>
    );
}

export default CartElements;