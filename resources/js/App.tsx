import React from "react";
import ReactDOM from "react-dom";



class App extends React.Component{



    render() {
        console.log("Salut")
        return(
            <h1>Salut</h1>
        )
    }
}

export default App;
if (document.getElementById('App')) {
    ReactDOM.render(<App/>, document.getElementById('App'));
}
