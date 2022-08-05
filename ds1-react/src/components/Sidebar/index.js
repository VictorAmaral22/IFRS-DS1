import './styles.css'
import React from 'react'

export default function Sidebar ({ servers, user }) {
    console.log('servers ',servers)

    return (
        <div className='container'>
            <div className='servers'>
                {servers.map(server => {
                    return <div style={{backgroundImage: 'url('+server.img+')'}} className='serverBall' />
                })}
            </div>
            <div className='user'>
                <div style={{backgroundImage: 'url('+user.avatar+')'}} className='user-image' />
                <p className='user-name'>{user.name}</p>
            </div>
        </div>
    )
}