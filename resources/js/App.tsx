import React, {useState} from "react";
import ReactDOM from "react-dom";
import '../sass/App.scss';
import {TextInput} from "./Components/Inputs/TextInput";


export const App: React.FC = () => {
    const [test, setTest] = useState('');

    return(
        <TextInput type={'text'} value={test} mode={'normal'} onChange={(e)=>{setTest(e.currentTarget.value)}}/>
    )

}

if (document.getElementById('App')) {
    ReactDOM.render(<App/>, document.getElementById('App'));
}
