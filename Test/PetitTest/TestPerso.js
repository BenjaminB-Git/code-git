import React, { Component, useState, useEffect } from 'react';
import { Text, View, StyleSheet, ScrollView, Button } from 'react-native';


const MesHp = () => {
    const [hp, setHp] = useState(0)

    const nbPvPlus = () => {
        setHp(hp + 1)
    }
    const nbPvMoins = () => {
        setHp(hp - 1)
    }

    async function getHp() {
        setHp(10)
    }
    useEffect(() => {
        getHp();
    }, []);

    if (hp == 0) {
        return (
            <View>
                <Text>
                    Lorem ipsum toussa, mais t'as perdu wesh
                </Text>
            </View>
        )
    }
    return (
        <View>
            <Text>
                Lorem ipsum dolor sit amet mes lucioles {'\n'}{'\n'}{'\n'}{'\n'}
                PV : {hp}
            </Text>
        <Button
            onPress={nbPvPlus}
            title="Plus" />
        <Button
            onPress={nbPvMoins}
            title = "Moins"
        />
    </View>

    )
}




class TestPerso extends Component {


    render() {


        //pvActuels = this.getNbPv()

      

        return (
            <View>
                <MesHp />
            </View>
        )
    }
}

export default TestPerso