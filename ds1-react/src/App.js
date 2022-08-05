import React, { useState } from 'react';
import './App.css';
import Sidebar from './components/Sidebar'
import Paresa from './components/Pares';

export default function App () {
  const servers = [
    { 
      img: 'https://miro.medium.com/max/875/1*vrGB9WUzo6iZln4LIdJ6Tw.jpeg', 
      name: 'Tiozão'
    },
    { 
      img: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbV9W3mCGQIueLN51qF96msGeENvHhiHVIVA&usqp=CAU', 
      name: 'Caraaaalho'
    },
    { 
      img: 'https://3.bp.blogspot.com/-5bGb9jJjUwU/W2T9HGCAEKI/AAAAAAACEjU/8FC67etaNLoM7LQ9z83K_PoszRbXX0HKwCLcBGAs/s1600/450-platao.png', 
      name: 'Servidor top'
    },
  ]

  const user = {
    avatar: 'http://farofageek.com.br/wp-content/uploads/2020/02/witcher-geralt-netflix.jpg',
    name: 'Clebinho',
  }

  const [numeros, setNumeros] = useState([]);

  return (
    <div className="App">
      <Sidebar servers={servers} user={user} />

      <Pares numeros={numeros} />
    </div>
  );
}
