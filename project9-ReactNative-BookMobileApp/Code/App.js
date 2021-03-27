import React, { useState } from "react";
import { createStackNavigator } from "@react-navigation/stack";
import { NavigationContainer, DefaultTheme } from "@react-navigation/native";
import { BookDetail } from "./screens/";
import Tabs from "./navigation/tabs";
import { useFonts } from "expo-font";
import BookContext from "./useContext/BookContext";
import Navigator from "./navigation/drawerNavigation";

const theme = {
  ...DefaultTheme,
  colors: {
    ...DefaultTheme.colors,
    border: "transparent",
  },
};

const Stack = createStackNavigator();
const App = () => {
  const [marks, setMarks] = useState([]);
  const [loaded] = useFonts({
    "Roboto-Black": require("./assets/fonts/Roboto-Black.ttf"),
    "Roboto-Bold": require("./assets/fonts/Roboto-Bold.ttf"),
    "Roboto-Regular": require("./assets/fonts/Roboto-Regular.ttf"),
    "DancingScript-Bold": require("./assets/fonts/DancingScript-Bold.ttf"),
  });

  if (!loaded) {
    return null;
  }
  return (
    <BookContext.Provider value={{marks,setMarks,}}>
      <NavigationContainer theme={theme}>
        <Navigator />
      </NavigationContainer>
    </BookContext.Provider>
  );
};

export default App;
