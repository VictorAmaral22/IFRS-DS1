import React, { useState, useEffect } from 'react'
import './styles.css';

export default function Pares ({ numeros }) {
    const [pares, setPares] = useState([]);

    const detectpares = (numeros) => {
        let pares = [];
        pares = numeros.filter(item => item%2 == 0);
        setPares(pares);
    }

    useEffect(() => {
        detectpares(numeros);

    }, [numeros])

    return (
        <div className='pares'>
            <h1>Só os pares sabem, só parearia</h1>
            <ul>
                {pares.map(item => {
                    return <li>{item}</li>;
                })}
            </ul>
        </div>
    );
}