import React, { Component } from 'react';
import { StyleSheet } from 'react-native'
import { WebView } from 'react-native-webview';

class App extends Component {

  render() {
    return (
      <WebView
        cacheMode='LOAD_NO_CACHE'
        style={{ marginTop: 10 }}
        /*source={{ uri: 'http://localhost:8080/xmobile-frontoffice/web' }}*/
        source={{ uri: 'http://192.168.0.103:8080/xmobile-frontoffice/web/#/' }}
        originWhitelist={['*']}
        javaScriptEnabled={true}
        mixedContentMode='always'
        onError={syntheticEvent => {
          const { nativeEvent } = syntheticEvent;
          console.warn('WebView error: ', nativeEvent);
        }}
      />
    );
  }  
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#F5FCFF',
  },
});

export default App;
