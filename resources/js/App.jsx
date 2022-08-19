<<<<<<< HEAD
import * as React from "react";
import {BrowserRouter, Route, Switch} from 'react-router-dom'
import '../../public/css/app.css';

class App extends React.Component{
    constructor(props) {
        super(props);
    }

    render() {
        return(
            <h1>Salut</h1>
        )
    }
}

export default App;
if (document.getElementById('app')) {
    ReactDOM.render(<App/>, document.getElementById('app'));
}
=======
import React from "react";
import ReactDOM from "react-dom";
class App extends React.Component {
    render() {
        console.log("Salut");
        return (<h1>Salut</h1>);
    }
}
export default App;
if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
//# sourceMappingURL=App.jsx.map
>>>>>>> prod
