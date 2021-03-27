import React from "react";
import {Text,View,TextInput,StyleSheet,FlatList,SafeAreaView,TouchableOpacity,Image,} from "react-native";
import myBooksData from "../data/books";
import { COLORS, FONTS, SIZES, icons, images } from "../constants";

function Search({ navigation }) {
  const [search, setSearch] = React.useState("");
  const [filteredDataSource, setFilteredDataSource] = React.useState();
  const [people, setPeople] = React.useState(myBooksData);
  const searchFilterFunction = (text) => {
    if (text) {
      const newData = people.filter(function (item) {
      const itemData = item.bookName ? item.bookName : "";
      const textData = text;
      return itemData.indexOf(textData) > -1;
    });
    setFilteredDataSource(newData);
    setSearch(text);
  } else {
      setFilteredDataSource(" ");
      setSearch(text);
    }
  };

  const renderItem = ({ item }) => {
    return (
      <View style={{ marginVertical: SIZES.base, marginLeft: 25 }}>
        <TouchableOpacity
          style={{ flex: 1, flexDirection: "row" }}
          onPress={() => navigation.navigate("BookDetail", { book: item })}
        >
          {/* Book Cover */}
          <Image
            source={item.bookCover}
            resizeMode="cover"
            style={{ width: 100, height: 150, borderRadius: 10 }}
          />
          <View style={{ flex: 1, marginLeft: SIZES.radius }}>
            {/* Book name and author */}
            <View>
              <Text
                style={{
                  paddingRight: SIZES.padding,
                  ...FONTS.h3,
                  color: COLORS.white,
                }}
              >
                {item.bookName}
              </Text>
              <Text style={{ ...FONTS.h4, color: COLORS.lightGray }}>
                {item.author}
              </Text>
            </View>
            {/* Book Info */}
            <View style={{ flexDirection: "row", marginTop: SIZES.radius }}>
              <Image
                source={icons.page_filled_icon}
                resizeMode="contain"
                style={{
                  width: 20,
                  height: 20,
                  tintColor: COLORS.lightGray,
                }}
              />
              <Text
                style={{
                  ...FONTS.body4,
                  color: COLORS.lightGray,
                  paddingHorizontal: SIZES.radius,
                }}
              >
                {item.pageNo}
              </Text>
            </View>
          </View>
        </TouchableOpacity>
      </View>
    );
  };
  return (
    <SafeAreaView style={{ flex: 1, backgroundColor: COLORS.black }}>
      <View
        style={{
          flexDirection: "row",
          paddingHorizontal: SIZES.radius,
          height: 70,
          alignItems: "flex-end",
        }}
      >
        <TouchableOpacity
          style={{ marginLeft: SIZES.base }}
          onPress={() => navigation.goBack()}
        >
          <Image
            source={icons.back_arrow_icon}
            resizeMode="contain"
            style={{
              width: 25,
              height: 25,
              tintColor: "white",
            }}
          />
        </TouchableOpacity>

        <View
          style={{
            flex: 1,
            alignItems: "center",
            justifyContent: "center",
            marginRight: 30,
          }}
        >
          <Text style={{ ...FONTS.h3, color: "white" }}>Search page</Text>
        </View>
      </View>
      <View style={{ width: 1000, paddingTop: SIZES.radius,marginBottom:SIZES.padding2 }}>
          <View style={{ flex: 1, borderTopColor: COLORS.lightGray, borderTopWidth: 1 }}></View>
    </View>
      <TextInput
        style={styles.textInst}
        value={search}
        placeholder="search"
        placeholderTextColor="gray"
        onChangeText={(text) => searchFilterFunction(text)}
      />
      <View style={{ flex: 1, marginTop: SIZES.padding }}>
        <FlatList
          numColumns={1}
          keyExtractor={(item) => item.id}
          data={filteredDataSource}
          renderItem={renderItem}
        />
      </View>
    </SafeAreaView>
  );
}

export default Search;

const styles = StyleSheet.create({
  textInst: {
    height: 50,
    borderWidth: 1,
    paddingLeft: 20,
    marginHorizontal: 20,
    borderRadius: 15,
    margin: 5,
    color: "white",
    borderColor: "gray",
    borderBottomWidth: 1,
    backgroundColor: "#1E1B26",
  },
});
