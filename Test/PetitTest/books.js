import React, { useState, useEffect } from 'react';
import {
  SafeAreaView,
  View,
  FlatList,
  StyleSheet,
  Text,
  ActivityIndicator,
} from 'react-native';

const BookItem = ({ title, author, price }) => (
  <View style={styles.item}>
    <View style={styles.itemLeft}>
      <Text style={styles.title}>{title}</Text>
      <Text style={styles.author}>{author}</Text>
    </View>
    <View style={styles.itemRight}>
      <Text style={styles.price}>${price}</Text>
    </View>
  </View>
);

const BookList = () => {
  const [books, setBooks] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(false);

  async function getBooks() {
    await new Promise((resolve) => setTimeout(resolve, 2000));
    setBooks([{
        id: 100,
        title: 'Golang experts',
        author: 'John Stack',
        price: 200
    },
    {
        id: 101,
        title: 'C++ for beginners',
        author: 'John Doe',
        price: 250
    }]);
    setLoading(false);
  }

  useEffect(() => {
      getBooks();
  }, []);

  if(error)
    return <Text style={styles.errorMsg}>Unable to connect to the server.</Text>;

  if(loading)
      return <ActivityIndicator size='large'/>;

  return (
    <FlatList
      data={books}
      renderItem={({ item }) => <BookItem {...item} />}
      keyExtractor={item => item.id}
    />
  );
}

const Pouet = () => {
  return (
    <SafeAreaView style={styles.container}>
      <BookList/>
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    marginTop: '10%',
  },
  item: {
    flex: 1,
    flexDirection: 'row',
    flexWrap: 'wrap',
    alignItems: 'flex-start',
    backgroundColor: '#eee',
    padding: 12,
    marginVertical: 8,
    marginHorizontal: 16,
  },
  itemLeft: {
    width: '70%'
  },
  itemRight: {
    width: '30%',
  },
  title: {
    fontSize: 22,
    color: '#222',
  },
  author: {
    fontSize: 16,
    color: '#333',
  },
  price: {
    fontSize: 20,
    color: '#333',
    textAlign: 'right'
  },
  errorMsg: {
    color: '#ee8888',
    fontSize: 20,
    padding: 24,
    textAlign: 'center'
  },
});

export default Pouet;