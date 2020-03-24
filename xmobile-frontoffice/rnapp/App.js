import React, { Component } from 'react';
import { ScrollView, StyleSheet } from 'react-native'
import { WebView } from 'react-native-webview';

class App extends Component {

  render() {
    return (
      <ScrollView contentContainerStyle={{ flexGrow: 1 }}>
      <WebView
        style={styles.container}
        cacheMode='LOAD_NO_CACHE'
        overScrollMode='always'
        style={{ marginTop: 10 }}
        source={{ uri: 'http://192.168.0.103/xmobile-frontoffice/web' }}
        originWhitelist={['*']}
        javaScriptEnabled={true}
        mixedContentMode='always'
        onError={syntheticEvent => {
          const { nativeEvent } = syntheticEvent;
          console.warn('WebView error: ', nativeEvent);
        }}        
      />
      </ScrollView>
    );
  }  
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    height: 100
  },
});

export default App;
