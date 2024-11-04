import React from 'react';
import './Footer.css'; // Importar el archivo CSS para el footer

const Footer = () => {
    return (
        <footer className="footer">
            <div className="footer-container">
                <p>&copy; {new Date().getFullYear()} CondoShopitech. Todos los derechos reservados.</p>
                <p>Contacto: info@condoshopitech.com</p>
            </div>
        </footer>
    );
}

export default Footer;