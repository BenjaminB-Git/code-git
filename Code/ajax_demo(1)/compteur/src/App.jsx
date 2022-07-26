import {React, useState} from 'react';

const App = (props) => {

    const [nom, setNom] = useState("");
    const [prenom,setPrenom] = useState("");

    const handleChangeNom = (evt) => {
        setNom(evt.target.value);
    }

    const handleChangePrenom = (evt) => {
        setPrenom(evt.target.value);
    }

    number= 0;

    const[add, addNumber] = useState("")

    const handleAddNumber = () => {
        addNumber 
    }

    const subNumber = () => {
        number-=1
    }




    return (
        <div>
            <div>
                Bonjour
                &nbsp;
                <span className='bolder'> 
                    {nom} {prenom}
                </span>
            </div>
            <input type="text" value={nom} onChange={handleChangeNom}/>
            <input type="text" value={prenom} onChange={handleChangePrenom}/>

            <div>
                {number}
            </div>
            <button id="add" onClick={handleAddNumber}>+1</button>
            <button id="sub" onClick={subNumber}>-1</button>

        </div>

    
    );





}

export { App };