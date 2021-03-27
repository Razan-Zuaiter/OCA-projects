import React, { useState, useEffect } from "react";
import { Image, TouchableOpacity } from "react-native";
import { NavigationContainer } from "@react-navigation/native";
import { createBottomTabNavigator } from "@react-navigation/bottom-tabs";
import { Home, Search } from "../screens/";
import { icons, COLORS } from "../constants";
import { DrawerActions } from "@react-navigation/native";
import { BookMarks } from "../screens/";

const menu = () => {
  <NavigationContainer>
    <Drawer.Navigator>
      <Drawer.Screen name="Home" component={Home} />
    </Drawer.Navigator>
  </NavigationContainer>;
};

const Tab = createBottomTabNavigator();

const tabOptions = {
  showLabel: false,
  style: {
    height: "10%",
    backgroundColor: COLORS.black,
  },
};

const Tabs = ({ navigation }) => {
  const [marksTab, setMarksTab] = useState([]);

  return (
    <Tab.Navigator
      tabBarOptions={tabOptions}
      screenOptions={({ route }) => ({
        tabBarIcon: ({ focused }) => {
          const tintColor = focused ? COLORS.white : COLORS.gray;

          switch (route.name) {
            case "Home":
              return (
                <Image
                  source={icons.dashboard_icon}
                  resizeMode="contain"
                  style={{
                    tintColor: tintColor,
                    width: 25,
                    height: 25,
                  }}
                />
              );

            case "Search":
              return (
                <Image
                  source={icons.search_icon}
                  resizeMode="contain"
                  style={{
                    tintColor: tintColor,
                    width: 25,
                    height: 25,
                  }}
                />
              );
            case "BookMarks":
              return (
                <TouchableOpacity
                  onPress={() => {
                    navigation.navigate("BookMarks");
                    setMarksTab(["d"]);
                  }}
                >
                  <Image
                    source={icons.bookmark_icon}
                    resizeMode="contain"
                    style={{
                      tintColor: tintColor,
                      width: 25,
                      height: 25,
                    }}
                  />
                </TouchableOpacity>
              );

            case "Categories":
              return (
                <TouchableOpacity
                  onPress={() =>
                    navigation.dispatch(DrawerActions.openDrawer())
                  }
                >
                  <Image
                    source={icons.menu_icon}
                    resizeMode="contain"
                    style={{
                      tintColor: tintColor,
                      width: 25,
                      height: 25,
                    }}
                  />
                </TouchableOpacity>
              );
          }
        },
      })}
    >
      <Tab.Screen name="Home" component={Home} />
      <Tab.Screen name="Search" component={Search} />
      <Tab.Screen name="BookMarks" component={BookMarks} />
      <Tab.Screen name="Categories" component={Home} />
    </Tab.Navigator>
  );
};

export default Tabs;
