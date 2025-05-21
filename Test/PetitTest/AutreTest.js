import React, { Component, useState, useEffect } from 'react';
import { Text, View, StyleSheet, ScrollView, Button } from 'react-native';



const Choix = () => {
    const [text, setText] = useState("")
    const [buttons, setButtons] = useState([])
    const [error, setError] = useState(false)

    var actions = [
        {
            "texte": "Ceci est l'action 1",
            "boutons":[
                {
                    "titre":"Aller à l'action 2",
                    "actif":1
                },
                {
                    "titre":"Aller à l'action 3",
                    "actif":2
                }

            ]
        },
        {
            "texte": "Ceci est l'action 2",
            "boutons":[
                {
                    "titre":"Aller à l'action 1",
                    "actif":0
                },
                {
                    "titre":"Aller à l'action 3",
                    "actif":2
                }

            ]
        },
        {
            "texte": "Ceci est l'action 3",
            "boutons":[
                {
                    "titre":"Aller à l'action 1",
                    "actif":0
                },
                {
                    "titre":"Aller à l'action 2",
                    "actif":1
                }

            ]
        }
    ]

    async function getSocle() {
        setText(actions[0].texte);
        setButtons(actions[0].boutons)
    }

    const handleSocle = (key) => {
        setText(actions[key].texte);
        setButtons(actions[key].boutons)

    }

    useEffect(() => {
        getSocle()
    }, [])
    

    if(error) {
        return(
            <View>
                AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
            </View>
        )
    }
    return(
        <View>
            <Text>
                {text}
                {'\n\n\n'}
            </Text>
            {
                buttons.map((item, index) => (
                    <Button
                        title = {item.titre}
                        onPress = {() => handleSocle(item.actif)} />
                ))
            }
        
        </View>
    )
}

class AutreTest extends Component {
    render() {
        return(
            <View>
                <Choix />
            </View>
        )
    }
}
export default AutreTest