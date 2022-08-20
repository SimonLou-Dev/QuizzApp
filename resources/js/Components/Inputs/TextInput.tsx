import React, {Component, FunctionComponent} from "react";

const Indicator: FunctionComponent<{mode: "success" | "error" | "normal"}> = (props) => {
    return(
        <div className={'input-indicator'}>
            {props.mode === "success" && <img src={'/assets/svgs/CheckRight.svg'} alt=""/>}
            {props.mode === "error" && <img src={'/assets/svgs/RedCross.svg'} alt=""/>}
        </div>
    )
}

interface TextInputProps {
    onChange?: (e: React.FormEvent<HTMLInputElement>) => void,
    value?: string,
    type: "text" | "password",
    placeholder?: string,
    mode?: "normal" | "error" | "success",
    maxLength?: number,
}

let defaultProps: TextInputProps = {
    onChange: () => {},
    value: '',
    type: 'text',
    placeholder: '',
    mode: "normal",
    maxLength: undefined,
}

export const TextInput: React.FC<TextInputProps> = (props) => {

    return (
        <div className="text-input">
            <input type={props.type} placeholder={props.placeholder} value={props.value} className={'short-input '+props.mode} maxLength={props.maxLength} onChange={props.onChange}/>
            {props.mode !== "normal" && <Indicator mode={props.mode}/>}

        </div>
    );
}
TextInput.defaultProps = defaultProps;




